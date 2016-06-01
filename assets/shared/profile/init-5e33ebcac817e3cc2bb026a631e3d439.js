var Breadcrumbs = new Class({
Implements:[ Events, Options ],
options:{
crumb_selector:".crumb",
disable_crumbs:!0
},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.crumbs = e.getElements(this.options.crumb_selector), 
_.each(this.crumbs, function(e, t) {
e.hasClass("disabled") || e.addEvent("click", function() {
this.fireEvent("go_to_index", [ t, e.get("data-page") ]);
}.bind(this));
}.bind(this));
},
changeActive:function(e) {
if (e >= this.crumbs.length) throw new Error("Index not in range");
_.each(this.crumbs, function(t, n) {
t.removeClass("active"), this.options.disable_crumbs && (e > n ? this.enableCrumb(n) :this.disableCrumb(n));
}.bind(this)), this.crumbs[e].addClass("active");
},
enableCrumb:function(e) {
this.crumbs[e].removeClass("disabled").addEvent("click", function() {
this.fireEvent("go_to_index", e);
}.bind(this));
},
disableCrumb:function(e) {
this.crumbs[e].addClass("disabled").removeEvents("click");
}
}), Page = new Class({
Implements:Events,
initialize:function(e, t) {
this.checks = [], this.root_el = e, this.error_msg_el = this.root_el.getElement(".page-error-msg"), 
this.next_buttons = _.map(this.root_el.getElements("button.next"), function(e) {
return new Button(e);
}), t && (this.hide_order_summary = t.hide_order_summary, this.name = t.name), _.each(this.next_buttons, function(e) {
e.addEvent("click", function() {
_.each(this.next_buttons, function(e) {
e.disable(t.button_loading_text);
}), this.hidePageError(), this.validate(function(e) {
e ? ("string" == typeof e && this.showPageError(e), _.each(this.next_buttons, function(e) {
e.enable();
})) :(this.fireEvent("next"), _.each(this.next_buttons, function(e) {
e.enable();
}));
}.bind(this));
}.bind(this));
}.bind(this));
},
validate:function(e) {
this.checks.length > 0 ? async.series(this.checks, e) :e(null, {
success:!0
});
},
pushValidation:function(e) {
this.checks.push(e);
},
removeValidations:function() {
this.checks = [];
},
showPageError:function(e) {
this.error_msg_el.set("text", e).show(), new Fx.Scroll(window, {
duration:250,
wheelStops:!1
}).toTop();
},
hidePageError:function() {
this.error_msg_el && this.error_msg_el.hide();
},
open:function() {
this.root_el.show(), new Fx.Scroll(window, {
duration:250,
wheelStops:!1
}).toTop();
},
close:function() {
this.hidePageError(), this.root_el.hide();
}
}), Book = new Class({
Implements:[ Events, Options ],
options:{
current_index:0
},
initialize:function(e, t) {
this.setOptions(t), this.pages = e, _.each(this.pages, function(e) {
e.addEvents({
next:this.nextPage.bind(this),
go_to:this.goToPage.bind(this)
});
}.bind(this));
},
nextPage:function() {
var e = this.options.current_index + 1;
return e >= this.pages.length ? !1 :(this.goToPage(this.pages[e]), void 0);
},
goToPage:function(e) {
this.pages[this.options.current_index].close(), e.open(), this.options.current_index = this.findPageIndex(e), 
this.fireEvent("page_change", [ e, this.options.current_index ]);
},
findPageIndex:function(e) {
return this.pages.indexOf(e);
},
findPageByName:function(e) {
return _.find(this.pages, function(t) {
return t.name === e;
});
},
getCurrentPage:function() {
return this.pages[this.options.current_index];
}
}), Harrys = Harrys || {}, Modal = new Class({
Implements:Events,
initialize:function(e) {
this.root_el = e, this.frame_el = this.root_el.getElement(".frame"), this.close_el = this.root_el.getElement("span.close"), 
this.close_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.root_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.frame_el.addEvent("click", function(e) {
e.stopPropagation();
});
},
open:function() {
return this.root_el.show(), this;
},
close:function() {
return this.root_el.hide(), this;
}
}), AddressModal = new Class({
Extends:Modal,
initialize:function(e) {
this.parent(e), this.message_el = this.root_el.getElement(".message"), this.suggestion_el = this.root_el.getElement(".suggestion"), 
this.ignore_button = new Button(this.root_el.getElement("button.ignore")), this.change_address_button = new Button(this.root_el.getElement("button.continue")), 
this.ignore_button.addEvent("click", function() {
this.close(null, {
success:!0
});
}.bind(this));
},
setupSuggestion:function(e) {
this.message_el.set("text", I18n.t("Modals.AddressModal.setupSuggestion"));
var t = {
address_line_1:e.street1,
address_line_2:e.street2 || "",
city:e.city,
state:e.state,
zip:e.zip,
country:e.country || ""
};
_.each(t, function(e, t) {
var n = this.suggestion_el.getElement('[data-field="' + t + '"]');
n && n.set("text", e);
}.bind(this)), this.suggestion_el.show(), this.change_address_button.setText("Yes! Use this one instead"), 
this.change_address_button.removeEvents("click").addEvent("click", function() {
this.fireEvent("use_suggestion", t), this.close(null, {
success:!0
});
}.bind(this));
},
setupNotFound:function() {
this.message_el.set("html", I18n.t("Modals.AddressModal.setupNotFound")), this.suggestion_el.hide(), 
this.change_address_button.setText("Fix Errors"), this.change_address_button.removeEvents("click").addEvent("click", function() {
this.close(!0, !1);
}.bind(this));
},
open:function(e, t) {
this.callback = t, e.returned_address ? this.setupSuggestion(e.returned_address) :this.setupNotFound(), 
this.root_el.show();
},
close:function(e, t) {
this.callback(e, t), this.callback = null, this.root_el.hide();
}
}), GiftModal = new Class({
Extends:Modal,
initialize:function(e) {
if (this.parent(e), this.active = !1, this.checks = [], this.step_one = this.root_el.getElement(".step.one"), 
this.step_two = this.root_el.getElement(".step.two"), this.card_els = this.root_el.getElements(".card"), 
this.back_el = this.root_el.getElement(".arrow.left"), this.inputs = {
to_name:new Input(this.root_el.getElement("input.to-name"), {
required:!0,
appendErrors:!0,
flashMessage:!1
}),
from_name:new Input(this.root_el.getElement("input.from-name"), {
required:!0,
appendErrors:!0,
flashMessage:!1
}),
message:new Textarea(this.root_el.getElement("textarea.message"), {
required:!0,
appendErrors:!0,
flashMessage:!1
}),
to_email:new EmailInput(this.root_el.getElement("input.to-email"), {
required:!1,
appendErrors:!0,
flashMessage:!1
})
}, this.add_card_button = new Button(this.root_el.getElement("button.add-card")), 
_.each(this.card_els, function(e) {
e.addEvents({
click:function() {
this.chooseCard(e.get("data-id"), e.get("data-image"));
}.bind(this),
mouseenter:function(e) {
_.each(this.card_els, function(t) {
t !== e.target && t.addClass("not-selected");
});
}.bind(this),
mouseleave:function() {
this.card_els.removeClass("not-selected");
}.bind(this)
});
}.bind(this)), this.back_el.addEvent("click", function() {
this.back();
}.bind(this)), this.inputs.message.el.addEvent("input", function() {
this.root_el.getElement(".counter").set("text", 175 - this.inputs.message.getValue().length);
}.bind(this)), this.add_card_button.addEvent("click", function() {
this.add_card_button.disable(), this.validate(function(e) {
this.add_card_button.enable(), e || (this.activate(), this.close());
}.bind(this));
}.bind(this)), this.checks.push(this._checkInputs.bind(this)), 1 === this.card_els.length) {
var t = this.card_els[0];
this.chooseCard(t.get("data-id"), t.get("data-image"));
}
},
back:function() {
this.step_two.hide(), this.step_one.show();
},
validate:function(e) {
this.checks.length > 0 ? async.auto(this.checks, e) :e(null, {
success:!0
});
},
_checkInputs:function(e) {
var t = [];
_.each(this.inputs, function(e) {
e.validate(function(e) {
e && t.push(e);
});
}), t.length > 0 ? e(_.uniq(t)) :e(null, {
success:!0
});
},
chooseCard:function(e, t) {
this.id = e, this.image = t, this.step_one.hide(), this.step_two.show();
},
getGiftInfo:function() {
var e = {
card_id:this.id,
image:this.image
};
return _.each(this.inputs, function(t, n) {
e[n] = t.getValue();
}), e;
},
activate:function() {
this.active = !0, this.fireEvent("active", this.getGiftInfo());
},
deactivate:function() {
this.active = !1;
},
isActive:function() {
return this.active;
},
close:function() {
this.root_el.hide(), this.step_two.hide(), this.step_one.show();
}
}), TwoStepGiftModal = new Class({
Extends:GiftModal,
initialize:function(e) {
this.root_el = e, this.header_el = this.root_el.getElement(".header"), this.heading = this.header_el.getElement("h5"), 
this.back_el = this.header_el.getElement(".back"), this.heading.set("text", "Which card would you like?"), 
this.parent(e), this.back_el.addEvent("click", function() {
this.back();
}.bind(this)), this.step_three = this.root_el.getElement(".step.three"), this.step_two_inputs = {
to_name:this.inputs.to_name,
from_name:this.inputs.from_name,
to_email:this.inputs.to_email
}, this.next_step_button = new Button(this.root_el.getElement("button.continue")), 
this.next_step_button.addEvent("click", function() {
this.next_step_button.disable(), this.partialValidate(this.step_two_inputs, function(e) {
this.next_step_button.enable(), e || (this.step_two.hide(), this.step_three.show(), 
this.heading.set("text", "Add Message"));
}.bind(this));
}.bind(this));
},
back:function() {
this.step_two.isVisible() ? (this.parent(), this.back_el.hide(), this.heading.set("text", "Which card would you like?")) :this.step_three.isVisible() && (this.step_three.hide(), 
this.step_two.show(), this.heading.set("text", "Add Details"));
},
partialValidate:function(e, t) {
async.auto([ function(t) {
var n = [];
_.each(e, function(e) {
e.validate(function(e) {
e && n.push(e);
});
}), n.length > 0 ? t(_.uniq(n)) :t(null, {
success:!0
});
}.bind(this) ], t);
},
chooseCard:function(e, t) {
this.parent(e, t), this.back_el.show(), this.heading.set("text", "Add Details");
},
getGiftInfo:function() {
return info = this.parent(), info.image = info.image.replace("mobile/", ""), info;
},
close:function() {
this.step_three.hide(), this.back_el.hide(), this.parent();
}
}), ProductUnavailableModal = new Class({
Extends:Modal,
initialize:function(e) {
this.parent(e), this.products_table = this.root_el.getElement("table.products"), 
this.return_button = this.root_el.getElement("button.return"), this.continue_button = this.root_el.getElement("button.continue");
},
_setup:function(e, t) {
this.products_table.empty().adopt(_.map(e, function(e) {
return this._productTemplate(e);
}.bind(this))), this.return_button.removeEvents("click").addEvent("click", function() {
_.each(e, function(e) {
Harrys.cart.setQuantity(e.key, 0);
}), Harrys.warn_on_leave = !1, window.location = "/products";
}), this.continue_button.removeEvents("click").addEvent("click", function() {
_.each(e, function(e) {
Harrys.cart.setQuantity(e.key, 0);
}), Harrys.warn_on_leave = !1, window.location.reload(!0);
}), t ? this.continue_button.hide() :this.continue_button.show();
},
_productTemplate:function(e) {
var t = {};
t.name = e.product.name;
var n = [];
e.product.color_slug && "chrome" !== e.product.color_slug && n.push(e.product.color), 
e.product.pack_size && n.push(e.product.pack_size + " Pack"), e.customizations.engraving && n.push(e.customizations.engraving), 
e.customizations.secondary_engraving && n.push(e.customizations.secondary_engraving), 
e.customizations.recipient_email && n.push(e.customizations.recipient_email), t.customizations = n.join(", "), 
t.quantity = e.quantity;
var i = e.customizations.interval;
return i && (i /= 30), t.interval = i ? "Every " + i + " Month" + (i > 1 ? "s" :"") :"", 
t.price = "$" + e.product.price.toInt().toFixed(2), t.total = "$" + (e.product.price * e.quantity).toInt().toFixed(2), 
Elements.from(_.template('<tr class="product"><td class="name"><strong><%= name %></stong><span><%= customizations %></span></td><td class="quantity">Qty: <%= quantity %></td><td class="interval"><%= interval %></td><td class="price"><%= price %></td><td class="total"><%= total %></td></tr>', t));
},
open:function(e, t, n) {
this.callback = n, this._setup(e, t), this.root_el.show();
},
close:function(e, t) {
this.callback && this.callback(e, t), this.callback = null, this.root_el.hide();
}
}), ConfirmModal = new Class({
Implements:[ Events, Options ],
options:{
message_text:"Are you sure you want to do that?",
cancel_text:"No",
continue_text:"Yes"
},
template:_.template('<div class="modal confirm background" style="display: none;"><div class="frame"><span class="close"></span><strong class="message"><%= message_text %></strong><% if (cancel_text) { %><button class="medium sentimental-blue cancel"><%= cancel_text %></button><% } %><% if (continue_text) { %><button class="medium blue continue"><%= continue_text %></button><% } %></div></div>'),
initialize:function(e) {
this.setOptions(e), this.root_el = Elements.from(this.template(this.options))[0], 
this.frame_el = this.root_el.getElement(".frame"), this.close_el = this.root_el.getElement("span.close"), 
this.close_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.message_el = this.root_el.getElement(".message");
var t = this.root_el.getElement("button.cancel");
t && (this.cancel_button = new Button(t));
var n = this.root_el.getElement("button.continue");
n && (this.continue_button = new Button(n)), this.cancel_button && this.cancel_button.addEvent("click", function() {
this.close(!0);
}.bind(this)), this.continue_button && this.continue_button.addEvent("click", function() {
this.close(null, {
success:!0
});
}.bind(this));
},
open:function(e) {
this.callback = e, this.root_el.inject(document.getElement("body")).show();
},
close:function(e, t) {
this.callback(e, t), this.callback = null, this.root_el.hide().dispose();
}
}), Harrys = Harrys || {}, AddressForm = new Class({
Implements:[ Events, Options ],
validations:[],
options:{},
disabledAddressTemplate:'<span class="line"><%= name %></span><span class="line"><%= address1 %></span><span class="line"><%= address2 %></span><span class="line"><%= city %>, <%= state %> <%= zip %></span><span class="line"><%= country %></span>',
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.name = this.options.name, this.inputs = {}, 
this.country_toggle = new Toggle(this.root_el.getElement(".country.toggle")), this.country = this.country_toggle.getValue(), 
this.disabledAddressTemplate = _.template(this.disabledAddressTemplate), this.disabledAddressContainer = this.root_el.getParent().getElement(".disabled-address"), 
this._setupInputs(), this.country_toggle.addEvent("change", this._onCountryChange.bind(this)), 
this.inputs.zip.addEvent("change", this._onZipChange.bind(this)), this.addValidation(this._checkInputs.bind(this)), 
this.addValidation(this._checkProvincePostalCode.bind(this));
},
_setupInputs:function() {
var e = {
required:!0,
appendErrors:!0,
flashMessage:!1
};
this.inputs.name = new Input(this.root_el.getElement("input.name"), e), this.inputs.address_line_1 = new Input(this.root_el.getElement("input.address_line_1"), e), 
this.inputs.address_line_2 = new Input(this.root_el.getElement("input.address_line_2"), {
appendErrors:!0,
flashMessage:!1
}), this.inputs.city = new Input(this.root_el.getElement("input.city"), e), this.inputs.state = new Select(this.root_el.getElement("select.state"), e), 
this.inputs.state.el.addEvent("change", function() {
this.fireEvent("state_change", this.inputs.state.getValue());
}.bind(this)), this.inputs.zip = new RegexInput(this.root_el.getElement("input.zip"), {
required:!0,
regex:Harrys.COUNTRIES[this.country].zip_format,
appendErrors:!0,
flashMessage:!1,
capitalize:!0
}), this.root_el.getElement("input.telephone") && (this.inputs.telephone = new PhoneInput(this.root_el.getElement("input.telephone"), e));
},
_onCountryChange:function(e) {
this.country = e, this.inputs.zip.setPattern(Harrys.COUNTRIES[this.country].zip_pattern), 
this.inputs.zip.setRegex(Harrys.COUNTRIES[this.country].zip_format), this.inputs.zip.setPlaceholder(Harrys.COUNTRIES[this.country].zip_label);
var t = "US" === this.country ? "State" :"Province/Territory", n = Object.map(Harrys.COUNTRIES[this.country].states, function(e, t) {
return t;
});
this.inputs.state.replaceOptionEls(t, n), this.fireEvent("country_change", e);
},
_onZipChange:function(e) {
this.zip = e, this.fireEvent("zip_change", this.inputs.zip);
},
getAddress:function() {
var e = _.reduce(this.inputs, function(e, t, n) {
return e[n] = t.getValue(), e;
}, {});
return e.country = this.country_toggle.getValue(), e.country_full = Harrys.COUNTRIES[this.country_toggle.getValue()].full_name, 
e;
},
getValue:function() {
return this.getAddress();
},
setAddress:function(e) {
return e.country && this.country_toggle.setValue(e.country), _.each(this.inputs, function(t, n) {
e[n] && t.setValue(e[n]).onValidationPass();
}), this;
},
clearInputs:function() {
return _.each(this.inputs, function(e) {
e.setValue("").onValidationPass();
}), this;
},
isPOBox:function() {
var e = /\b[P|p]*(OST|ost)*\.*\s*[O|o|0]*(ffice|FFICE)*\.*\s*[B|b][O|o|0][X|x]\b/;
return e.test(this.inputs.address_line_1.getValue()) || e.test(this.inputs.address_line_2.getValue());
},
validate:function(e) {
this.validations.length > 0 ? async.auto(this.validations, e) :e(null, {
success:!0
});
},
addValidation:function(e) {
this.validations.push(e);
},
_checkInputs:function(e) {
var t = [];
_.each(this.inputs, function(e) {
e.validate(function(e) {
e && t.push(e);
});
}), t.length > 0 ? e(_.uniq(t)) :e(null, {
success:!0
});
},
_checkProvincePostalCode:function(e) {
var t, n;
"CA" == this.country && (t = this.inputs.state.getValue(), n = this.inputs.zip.getValue(), 
_.contains(Harrys.CANADA_POSTAL_PREFIXES[t], n[0]) ? e(null, {
success:!0
}) :(this.inputs.state.onValidationFailure(I18n.t("AddressForm._checkProvincePostalCode.ca_postal_code_mismatch")), 
this.inputs.zip.onValidationFailure(I18n.t("AddressForm._checkProvincePostalCode.ca_province_mismatch")), 
e(I18n.t("AddressForm._checkProvincePostalCode.ca_postal_code_province_mismatch")))), 
e(null, {
success:!0
});
},
enable:function() {
return this.country_toggle.enable(), _.each(this.inputs, function(e) {
e.enable();
}), this;
},
disable:function() {
return this.country_toggle.disable(), _.each(this.inputs, function(e) {
e.disable();
}), this;
},
setDisabledAddress:function(e, t) {
var n = this.disabledAddressTemplate({
name:e.name || e.first_name + " " + e.last_name,
address1:e.address_line_1,
address2:e.address_line_2,
city:e.city,
state:e.state,
zip:e.zip,
country:e.country_full.replace(/\w\S*/g, function(e) {
return e.charAt(0).toUpperCase() + e.substr(1).toLowerCase();
})
});
this.disabledAddressContainer.set("html", n), t && this.disabledAddressContainer.show();
},
hideDisabledAddress:function() {
this.disabledAddressContainer.hide();
},
show:function() {
this.fireEvent("country_change", this.country), this.root_el.show();
},
hide:function() {
this.root_el.hide();
}
}), Harrys = Harrys || {}, PaymentForm = new Class({
Implements:[ Events, Options ],
validations:[],
options:{
disabled_fields:[]
},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.name = this.options.name, this.inputs = {}, 
this._setupInputs(), this.addValidation(this._checkInputs.bind(this)), this.addValidation(this._checkExpirationDate.bind(this));
},
_setupInputs:function() {
var e = {
required:!0,
appendErrors:!0,
flashMessage:!1
};
_.contains(this.options.disabled_fields, "card_number") || (this.inputs.card_number = new CreditCardInput(this.root_el.getElement("input.card_number"), e)), 
_.contains(this.options.disabled_fields, "month") || (this.inputs.month = new MonthSelect(this.root_el.getElement("select.month"), e)), 
_.contains(this.options.disabled_fields, "year") || (this.inputs.year = new YearSelect(this.root_el.getElement("select.year"), e)), 
_.contains(this.options.disabled_fields, "ccv") || (this.inputs.ccv = new Input(this.root_el.getElement("input.ccv"), e)), 
_.each(this.options.disabled_fields, function(e) {
this.root_el.getElement("." + e).set("disabled", !0);
}, this);
},
getData:function() {
return _.reduce(this.inputs, function(e, t, n) {
return e[n] = t.getValue(), e;
}, {});
},
getValue:function() {
return this.getData();
},
setData:function(e) {
_.each(this.inputs, function(t, n) {
e[n] && t.setValue(e[n]);
});
},
clearInputs:function() {
_.each(this.inputs, function(e) {
e.clear();
});
},
validate:function(e) {
this.validations.length > 0 ? async.auto(this.validations, e) :e(null, {
success:!0
});
},
addValidation:function(e) {
this.validations.push(e);
},
_checkInputs:function(e) {
var t = [];
_.each(this.inputs, function(e) {
e.validate(function(e) {
e && t.push(e);
});
}), t.length > 0 ? e(_.uniq(t)) :e(null, {
success:!0
});
},
_checkExpirationDate:function(e) {
var t = this.inputs.month.getValue().toInt(), n = this.inputs.year.getValue().toInt(), i = moment();
n === i.year() && t < i.month() + 1 ? (this.inputs.month.onValidationFailure(I18n.t("PaymentForm._checkExpirationDate.error")), 
this.inputs.year.onValidationFailure(I18n.t("PaymentForm._checkExpirationDate.error")), 
e(I18n.t("PaymentForm._checkExpirationDate.error"))) :e(null, {
success:!0
});
}
}), BillingProfile = new Class({
initialize:function(e) {
this.data = e;
},
toStripeFormat:function() {
var e = this.data.billing_profile;
return {
number:e.card_number,
cvc:e.ccv,
exp_month:e.month,
exp_year:e.year,
name:e.name,
address_line1:e.address_line_1,
address_line2:e.address_line_2,
address_city:e.city,
address_state:e.state,
address_zip:e.zip,
address_country:e.country
};
}
}), DetailsSection = new Class({
Implements:[ Events, Options ],
options:{
validation_success_message:"Details saved successfully"
},
$validations:[],
initialize:function(e, t, n) {
this.setOptions(n), this.root_el = e, this.forms = _.isArray(t) ? t :[ t ], this.show_view = this.root_el.getElement(".view.show"), 
this.form_view = this.root_el.getElement(".view.form"), this.show_view && (this.edit_link = this.show_view.getElement(".link.edit")), 
this.edit_link && this.edit_link.addEvents({
click:function() {
this.show_view && this.show_view.hide(), this.form_view && this.form_view.show();
}.bind(this),
mouseover:function() {
this.show_view && this.show_view.addClass("hover");
}.bind(this),
mouseout:function() {
this.show_view && this.show_view.removeClass("hover");
}.bind(this)
}), this.form_view && (this.cancel_link = this.form_view.getElement(".link.cancel")), 
this.cancel_link && this.cancel_link.addEvent("click", function() {
this.form_view && this.form_view.hide(), this.show_view && this.show_view.show();
}.bind(this));
var i = this.root_el.getElement("button");
i && (this.button = new Button(i), this.button.addEvent("click", function() {
this.button.disable(), this.validate(function(e, t) {
t = t || {}, t.msg = t.msg || this.options.validation_success_message, e ? (e.message ? new Flash(e.message, "error") :e.messages && _.each(e.messages, function(e) {
new Flash(e, "error");
}), this.button.enable()) :(new Flash(t.msg, "notice"), this.form_view && this.show_view && (this.form_view.hide(), 
this.show_view.show()), this.button.enable());
}.bind(this));
}.bind(this))), _.each(this.forms, function(e) {
this.addValidation(e.validate.bind(e));
}.bind(this)), this.addValidation(this.request.bind(this));
},
request:function(e) {
e(null, {
success:!0
});
},
_sendRequest:function(e, t, n) {
new SignedRequest.JSON({
url:e,
data:t,
onSuccess:function(e) {
e.success ? this._success(e, n) :this._error(e, n);
}.bind(this),
onFailure:function(e) {
this._failure(e, n);
}.bind(this)
}).send();
},
_success:function(e, t) {
t(null, e);
},
_error:function(e, t) {
var n = _.map(e.errors, function(e) {
var t;
switch (e.type) {
case "validation":
t = e.field.replace("_", " ") + " " + e.message, t.capitalize();
break;

default:
t = e.message ? e.message :e;
}
return t;
});
t({
messages:n
});
},
_failure:function(e, t) {
var n = I18n.t("global.error.cannot_connect_try_again");
new Flash(n, "error"), t && t(n);
},
setFields:function(e) {
return _.each(e, function(e, t) {
var n = this.root_el.getElement('[data-field-name="' + t + '"]');
n && n.set("text", e);
}.bind(this)), this;
},
validate:function(e) {
this.$validations.length > 0 ? async.series(this.$validations, e) :e(null, {
success:!0
});
},
addValidation:function(e) {
this.$validations.push(e);
}
}), NameDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/UserService/updateName",
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return e[t.name] = t.getValue(), e;
}, {});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
this.setFields({
name:e.data.first_name + " " + e.data.last_name
}), t(null, e);
}
}), EmailPasswordDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/UserService/updateEmailPassword",
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return e[t.name] = t.getValue(), e;
}, {});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
this.setFields(e.data), t(null, e);
}
}), ShippingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/ShippingAddressService/updateShippingAddressById",
initialize:function(e, t, n) {
this.parent(e, t, n), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this shipping address.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(e) {
var t;
e || (t = new SignedRequest.JSON({
url:"/api/v1/ShippingAddressService/removeShippingAddressById",
data:{
id:this.id
},
onSuccess:function(e) {
e.success ? (this.fireEvent("removed", {
data:e.data,
section:this
}), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(e) {
this._failure(e);
}.bind(this)
}), t.send());
}.bind(this));
}.bind(this));
},
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return e[t.name] = t.getValue(), e;
}, {
id:this.id
});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
var n = this.id;
this.id = e.data.id, e.data.address.name = e.data.address.name, this.setFields(e.data.address), 
this.root_el.set("data-id", this.id), this.fireEvent("changed", {
data:e.data,
section:this,
old_id:n
}), t(null, e);
}
}), CreateShippingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/ShippingAddressService/create",
request:function(e) {
var t = {};
_.each(this.forms, function(e) {
t[e.name] = e.getValue();
}), this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
e.data.address.id = e.data.id;
var n = Elements.from(shipping_address_template(e.data.address))[0], i = this.setupShippingSection(n);
_.each(this.forms, function(e) {
e.clearInputs();
}), this.root_el.getElement("ul").adopt(n), this.fireEvent("created", {
data:e.data,
section:i
}), t(null, e);
},
setupShippingSection:function(e) {
var t = e.get("data-id"), n = new AddressForm(e.getElement(".form.shipping_" + t), {
name:"shipping_address"
});
return new ShippingDetailsSection(e, n);
}
}), BillingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/BillingProfileService/updateBillingProfileById",
initialize:function(e, t, n) {
this.parent(e, t, n), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this billing profile.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(e) {
var t;
e || (t = new SignedRequest.JSON({
url:"/api/v1/BillingProfileService/removeBillingProfileById",
data:{
id:this.id
},
onSuccess:function(e) {
e.success ? (this.fireEvent("removed", {
data:e.data,
section:this
}), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(e) {
this._failure(e);
}.bind(this)
}), t.send());
}.bind(this));
}.bind(this));
},
request:function(e) {
{
var t = _.reduce(this.forms, function(e, t) {
return e.billing_profile = _.extend(e.billing_profile, t.getValue()), e;
}, {
billing_profile:{}
});
new BillingProfile(t);
}
this._sendRequest(this.url, {
id:this.id,
billing_profile:t.billing_profile
}, e);
},
_success:function(e, t) {
var n = this.id;
this.id = e.data.id, e.data.card_number = "XXXX" + e.data.card_number.substr(-4), 
this.setFields(e.data), this.root_el.set("data-id", e.data.id), this.fireEvent("changed", {
data:e.data,
section:this,
old_id:n
}), t(null, e);
}
}), CreateBillingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/BillingProfileService/create",
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return e.billing_profile = _.extend(e.billing_profile, t.getValue()), e;
}, {
billing_profile:{}
}), n = new BillingProfile(t);
Stripe.card.createToken(n.toStripeFormat(), function(t, n) {
n.error ? e(n.error) :this._sendRequest(this.url, {
billing_profile:{
stripe_card_token:n.id
}
}, e);
}.bind(this));
},
_success:function(e, t) {
e.data.number = "XXXX" + e.data.card_number.substr(-4);
var n = Elements.from(billing_profile_template(e.data))[0], i = this.setupBillingSection(n);
_.each(this.forms, function(e) {
e.clearInputs();
}), this.root_el.getElement("ul").adopt(n), this.fireEvent("created", {
data:e.data,
section:i
}), t(null, e);
},
setupBillingSection:function(e) {
var t = e.get("data-id"), n = e.getElement(".form.payment.billing_" + t), i = e.getElement(".form.address.billing_" + t), s = [];
return n && s.push(new PaymentForm(n, {
disabled_fields:[ "ccv", "card_number" ]
})), i && s.push(new AddressForm(i)), new BillingDetailsSection(e, s);
}
}), ShavePlanDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/SubscriptionService/modifySubscription",
initialize:function(e, t, n) {
this.parent(e, t, n), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this Shave Plan.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(e) {
var t;
e || (t = new SignedRequest.JSON({
url:"/api/SubscriptionService/cancelSubscription",
data:{
subscription_id:this.id
},
onSuccess:function(e) {
e.success ? (this.fireEvent("removed", e), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(e) {
this._failure(e);
}.bind(this)
}), t.send());
}.bind(this));
}.bind(this));
},
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return _.extend(e, t.getValue());
}, {
subscription_id:this.id
});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
e.data.subscription.interval = "Every " + e.data.subscription.interval / 30 + " Month" + (e.data.subscription.interval / 30 === 1 ? "" :"s"), 
e.data.subscription.next_send = moment(e.data.subscription.next_send, "YYYY-MM-DD").format("D MMMM, YYYY"), 
this.setFields(e.data.subscription), this.fireEvent("change", e), t(null, e);
}
}), ShavePlanCreateDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/SubscriptionService/createSubscription",
initialize:function(e, t, n) {
this.parent(e, t, n), this.id = this.root_el.get("data-viewable-product-id");
},
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return _.extend(e, t.getValue());
}, {
subscription_viewable_product_id:this.id
});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
this.root_el.destroy(), this.fireEvent("created", e), t(e);
}
}), ShavePlanGroup = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.key = this.root_el.get("id"), this.items = this.root_el.getElements("li");
},
findItem:function(e) {
return _.find(this.items, e);
},
filterItems:function(e) {
return _.filter(this.items, e);
},
addItemEl:function(e) {
return this.root_el.adopt(e), this.items.push(e), this.root_el.show(), this;
},
removeItemEl:function(e) {
return this.items = _.without(this.items, e), 0 === this.items.length && this.root_el.hide(), 
this;
}
}), InviteCreateDetailsSection = new Class({
Extends:DetailsSection,
options:{
validation_success_message:"Invite Sent Successfully"
},
url:"/api/InviteService/inviteByEmail",
request:function(e) {
var t = _.reduce(this.forms, function(e, t) {
return _.extend(e, t.getValue()), e;
}, {});
this._sendRequest(this.url, t, e);
},
_success:function(e, t) {
_.each(this.forms, function(e) {
e.unsetValue(), e.removeInput("referrer_first_name"), e.removeInput("referrer_last_name");
}), this.fireEvent("new_invite", e.data), t(null, e);
}
}), ProfileForm = new Class({
Implements:[ Events, Options ],
options:{},
$validations:[],
inputs:{},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.name = this.root_el.get("name") || this.options.name, 
this._setupInputs(), this.addValidation(this._checkInputs.bind(this));
},
_setupInputs:function() {
this.inputs = _.reduce(this.root_el.getElements(".field input"), function(e, t) {
var n = new Input(t, {
required:"false" !== t.get("data-required"),
flashMessage:!1,
appendErrors:!0
});
return e[n.name] = n, e;
}.bind(this), {});
},
getValue:function() {
return _.reduce(this.inputs, function(e, t) {
return e[t.name] = t.getValue(), e;
}.bind(this), {});
},
setValue:function(e) {
return _.each(this.inputs, function(t, n) {
e[n] && t.setValue(e[n]).onValidationPass();
}), this;
},
unsetValue:function() {
return _.each(this.inputs, function(e) {
e.setValue("").onValidationPass();
}), this;
},
validate:function(e) {
this.$validations.length > 0 ? async.series(this.$validations, e) :e(null, {
success:!0
});
},
addValidation:function(e) {
this.$validations.push(e);
},
removeValidation:function(e) {
var t = this.$validations.indexOf(e);
-1 !== t && delete this.$validations[t];
},
_checkInputs:function(e) {
var t = [];
_.each(this.inputs, function(e) {
e.validate(function(e) {
e && t.push(e);
});
}), t.length > 0 ? e(_.uniq(t)) :e(null, {
success:!0
});
},
removeInput:function(e) {
var t = this.inputs[e];
t && (delete this.inputs[e], t.el.dispose());
},
enable:function() {
return _.each(this.inputs, function(e) {
e.enable();
}), this;
},
disable:function() {
return _.each(this.inputs, function(e) {
e.disable();
}), this;
},
show:function() {
this.root_el.show();
},
hide:function() {
this.root_el.hide();
},
clearInputs:function() {}
}), EmailPasswordForm = new Class({
Extends:ProfileForm,
_setupInputs:function() {
this.inputs.email = new EmailInput(this.root_el.getElement('input[type="email"]'), {
required:!0,
flashMessage:!1,
appendErrors:!0
}), this.inputs.password = new PasswordInput(this.root_el.getElement('input[name="password"]'), {
required:!1,
flashMessage:!1,
appendErrors:!0
}), this.inputs.new_password = new PasswordInput(this.root_el.getElement('input[name="current_password"]'), {
required:!0,
flashMessage:!1,
appendErrors:!0
}), _.each(this.inputs, function(e) {
this.addValidation(e.validate.bind(e));
}.bind(this));
},
clearInputs:function() {
this.inputs.password.setValue(null), this.inputs.new_password.setValue(null);
}
}), ShavePlanForm = new Class({
Extends:ProfileForm,
_setupInputs:function() {
this.inputs.quantity = new QuantityInput(this.root_el.getElement(".quantity input")), 
this.inputs.interval = new IntervalInput(this.root_el.getElement(".interval input")), 
this.inputs.next_send = new NextSendInput(this.root_el.getElement(".next-send input"));
var e = this.root_el.getElement(".shipping select");
e && (this.inputs.shipping_id = new Select(e));
var t = this.root_el.getElement(".billing select");
t && (this.inputs.billing_id = new Select(t)), this.inputs.quantity.addEvent("change", function(e) {
this.fireEvent("quantity_change", e);
}.bind(this));
},
updateSelectOption:function(e, t, n, i) {
var s = this.inputs[e];
return s && s.updateOptionEl(t, n, i), this;
},
addSelectOption:function(e, t, n, i) {
var s = this.inputs[e];
return s && s.addOptionEl(t, n, i), this;
},
removeSelectOption:function(e, t) {
var n = this.inputs[e];
return n && n.removeOptionEl(t), this;
}
}), Invite = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.id = this.root_el.get("data-id");
}
}), address_form_html = '<div class="form address <%= form_type %>_<%= id %> grid"><div class="toggle country col-1-1"><div><input type="radio" name="<%= form_type %>_<%= id %>[country]" value="US" id="<%= form_type %>_<%= id %>_country_us" <% if (!country || country==="US") { %> checked <% } %>><label for="<%= form_type %>_<%= id %>_country_us" class="us"><span class="img"></span> United States</label></div><div><input type="radio" name="<%= form_type %>_<%= id %>[country]" value="CA" id="<%= form_type %>_<%= id %>_country_ca" <% if (country==="CA") { %> checked <% } %>><label for="<%= form_type %>_<%= id %>_country_ca" class="ca"><span class="img"></span> Canada</label></div></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_name" class="for-ie">Name</label><input id="<%= form_type %>_<%= id %>_name" type="text" placeholder="Name" name="<%= form_type %>_<%= id %>[name]" class="name" maxlength="100" value="<%= name %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_address_line_1" class="for-ie">Address Line 1</label><input id="<%= form_type %>_<%= id %>_address_line_1" type="text" placeholder="Address" name="<%= form_type %>_<%= id %>[address_line_1]" class="address_line_1" maxlength="30" value="<%= address_line_1 %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_address_line_2" class="for-ie">Address Line 2</label><input id="<%= form_type %>_<%= id %>_address_line_2" type="text" placeholder="Apt / Suite #" name="<%= form_type %>_<%= id %>[address_line_2]" class="address_line_2" maxlength="255" value="<%= address_line_2 %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_city" class="for-ie">City</label><input id="<%= form_type %>_<%= id %>_city" type="text" placeholder="City" name="<%= form_type %>_<%= id %>[city]" class="city" maxlength="255" value="<%= city %>"></div><div class="col-1-2 pad-r"><label for="<%= form_type %>_<%= id %>_state" class="for-ie">State</label><select id="<%= form_type %>_<%= id %>_state" name="<%= form_type %>_<%= id %>[state]" class="state"><option value="" disabled <%= (!state) ? "selected" : "" %>>State</option><% _.each(Harrys.COUNTRIES[country].states, function (state_name, state_code) { %><option value="<%= state_code %>" <%= (state===state_code) ? "selected" : "" %>><%= state_code %></option><% }); %></select></div><div class="col-1-2 pad-l"><label for="<%= form_type %>_<%= id %>_zip" class="for-ie">Zip/Postal</label><input id="<%= form_type %>_<%= id %>_zip" type="text" value="<%= zip %>" placeholder="<%= Harrys.COUNTRIES[country].zip_label %>" pattern="<%= Harrys.COUNTRIES[country].zip_pattern %>" name="<%= form_type %>_<%= id %>[zip]" class="zip" maxlength="11"></div><% if (form_type.indexOf("shipping") === 0) { %><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_telephone" class="for-ie">Telephone</label><input id="<%= form_type %>_<%= id %>_telephone" type="text" value="<%= telephone %>" placeholder="Telephone" pattern="\\d*" name="<%= form_type %>_<%= id %>[telephone]" class="telephone" maxlength="20"></div><% } %><button class="blue medium">Save</button></div>', payment_form_html = '<div class="form payment <%= form_type %>_<%= id %> grid"><div class="col-1-1"><p class="h6 black-blue">Credit / Debit Card Number</p><label for="<%= form_type %>_card_number" style="display: none;">Card Number</label><input id="<%= form_type %>_card_number" type="text" name="<%= form_type %>_<%= id %>[card_number]" placeholder="Card Number" class="card_number" value="<%= card_number %>"></div><div class="col-2-3 grid pad-r"><p class="black-blue col-1-1">Expiration Date</p><div class="col-1-2 pad-r"><label for="<%= form_type %>_month" style="display: none;">Month</label><select class="month" id="<%= form_type %>_month" name="<%= form_type %>_<%= id %>[month]"><% _(12).times(function(i){i++; %><option <%= month === i ? "selected" : "" %> value="<%= i %>"><%= ("0" + i).slice(-2) %></option><% }); %></select></div><div class="col-1-2 pad-l"><label for="<%= form_type %>_year" style="display: none;">Year</label><select class="year" id="<%= form_type %>_year" name="billing_new[year]"><% for (var y=moment().year(); y<(moment().year()+10); y++) { %><option <%= year === y ? "selected" :  "" %> value="<%= y %>"><%= y %></option><% } %></select></div></div><div class="col-1-3 pad-l"><p class="black-blue">Security Code</p><label for="<%= form_type %>_ccv" style="display: none;">CCV</label><input id="<%= form_type %>_ccv" type="text" class="ccv" name="<%= form_type %>_<%= id %>[ccv]" placeholder="CCV" value="XXX"></div></div>', Harrys = Harrys || {}, shipping_address_html = '<li data-id="<%= id %>"><div class="show view"><p><span data-field-name="name"><%= name %></span></p><p><span data-field-name="address_line_1"><%= address_line_1 %></span> <span data-field-name="address_line_2"><%= address_line_2 %></span></p><p><span data-field-name="city"><%= city %></span> <span data-field-name="state"><%= state%></span>, <span data-field-name="zip"><%= zip %></span></p><div class="right table"><div class="middle"><span class="link edit">Edit</span><br><span class="link remove">Remove</span></div></div></div><div class="form view" style="display: none;"><% var form_type = "shipping"; %>' + address_form_html + '<div class="right"><span class="link cancel">Cancel</span></div></div></li>', billing_profile_html = '<li data-id="<%= id %>"><div class="show view"><p><span data-field-name="name"><%= name %></span> </p><p><span data-field-name="card_number"><%= card_number %></span></p><p><span data-field-name="address_line_1"><%= address_line_1 %></span> <span data-field-name="address_line_2"><%= address_line_2 %></span></p><p><span data-field-name="city"><%= city %></span> <span data-field-name="state"><%= state %></span>, <span data-field-name="zip"><%= zip %></span></p><div class="right table"><div class="middle"><span class="link edit">Edit</span><br><span class="link remove">Remove</span></div></div></div><div class="form view" style="display: none;"><% var form_type = "billing"; %>' + payment_form_html + address_form_html + '<div class="right table"><div class="middle"><span class="link cancel">Cancel</span></div></div></div></li>', shipping_address_template = _.template(shipping_address_html), billing_profile_template = _.template(billing_profile_html), ns_format = Harrys.IS_MOBILE ? "MM/DD/YYYY" :"D MMMM, YYYY", shave_plan_html = '<li data-id="<%= id %>" data-viewable-product-id="<%= product.id %>"><div class="view show clear"><img src="<%= product.shave_plan_image_grey %>" class="product-image grey"><img src="<%= product.shave_plan_image_white %>" class="product-image white"><section><h3><%= product.name %></h3><% if (product.pack_size) { %><span><%= product.pack_size %> Pack</span><br><% } %><% if (product.tube_size) { %><span><%= product.tube_size %></span><br><% } %><span class="total">$<%= (product.price * quantity) %>.00</span><span class="price-per">(<%= (product.pack_size) ? "$" + (product.price/product.pack_size) + ".00 per blade" : "$" + (product.price) + "0 each" %>)</span><div class="right"><span class="link edit">Edit</span></div></section><section class="clear"><label class="float-left">Quantity</label><span class="float-right quantity" data-field-name="quantity"><%= quantity %></span></section><section class="clear"><label class="float-left">Ships</label><span class="float-right interval" data-field-name="interval">Every <%= interval / 30 %> Month<%= (interval!==30) ? "s" : "" %></span></section><section class="clear"><label class="float-left">Next Shipment</label><span class="float-right next-send" data-field-name="next_send"><%= moment(next_send).format("' + ns_format + '") %></span></section></div><div class="view form clear" style="display: none;"><img src="<%= product.shave_plan_image_white %>" class="product-image"><section><h3><%= product.name %></h3><% if (product.pack_size) { %><span><%= product.pack_size %> Pack</span><br><% } %><% if (product.tube_size) { %><span><%= product.tube_size %></span><br><% } %><span class="total">$<%= (product.price * quantity) %>.00</span><span class="price-per">(<%= (product.pack_size) ? "$" + (product.price/product.pack_size) + ".00 per blade" : "$" + (product.price) + "0 each" %>)</span><div class="right"><span class="link cancel">Cancel</span></div></section><section class="quantity clear"><label class="float-left">Quantity</label><div class="float-right quantity"><input type="text" value="<%= quantity %>" name="subscription_quantity"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><section class="clear"><label class="float-left">Ships</label><div class="float-right interval"><span class="text">Every <%= interval / 30 %> Month<%= (interval!==30) ? "s" : "" %></span><input type="hidden" value="<%= interval / 30 %>" name="subscription_interval"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><section class="clear"><label class="float-left">Next Shipment</label><div class="float-right next-send"><span class="text"><%= moment(next_send).format("' + ns_format + '") %></span><input type="hidden" value="<%= next_send %>" name="subscription_next_send"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><div class="clear"><button class="float-left blue medium">Save Changes</button><span class="float-right link remove">Remove</span></div></div></li>', shave_plan_template = _.template(shave_plan_html), plan_group_html = '<div class="plan" id="<%= key %>"><div class="plan-header"><h2>Ships Every <%= interval %> Month<% if (interval!==1) { %>s<% } %></h2><p>Next Shipment &mdash; <%= moment(next_send).format("D MMMM, YYYY") %></p></div></div>';

plan_group_template = _.template(plan_group_html), window.addEvent("domready", function() {
function e(t) {
if (!t.hasClass("empty")) {
var n, i = Harrys.productsManager.findById(t.get("data-viewable-product-id")), s = new ShavePlanForm(t.getElement(".form.view"));
n = "new" === t.get("data-id") ? new ShavePlanCreateDetailsSection(t, s) :new ShavePlanDetailsSection(t, s), 
m.addEvents({
created:function(e) {
var t = e.section.id, n = e.data.address.address_line_1;
s.addSelectOption("shipping_id", n, t);
}.bind(this)
}), _.each(g, function(e) {
e.addEvents({
changed:function(e) {
var t = e.old_id, n = e.data.address.address_line_1, i = {
value:e.data.id
};
s.updateSelectOption("shipping_id", n, t, i);
},
removed:function(e) {
s.removeSelectOption("shipping_id", e.section.id);
}
});
}), M.addEvents({
created:function(e) {
var t = e.section.id, n = e.data.card_number;
s.addSelectOption("billing_id", n, t);
}.bind(this)
}), _.each(w, function(e) {
e.addEvents({
changed:function(e) {
var t = e.old_id, n = e.data.card_number, i = {
value:e.data.id
};
s.updateSelectOption("billing_id", n, t, i);
},
removed:function(e) {
s.removeSelectOption("billing_id", e.section.id);
}
});
}), s.addEvents({
quantity_change:function(e) {
_.each(t.getElements(".total"), function(t) {
t.set("text", "$" + i.price * e + ".00");
});
}
}), n.addEvents({
created:function(t) {
var n = t.data.subscription || {};
n.product = Harrys.productsManager.find({
id:t.data.viewable_product_id
});
var i, s = Elements.from(shave_plan_template(n))[0], r = _.findWhere(k, {
key:t.data.key
}), a = n.interval;
a / 30 >= 1 && (a /= 30), r || (i = Elements.from(plan_group_template({
key:t.data.key,
next_send:n.next_send,
interval:a
}))[0], document.getElement(".shave-plan.page").getElement("ul").adopt(i), r = new ShavePlanGroup(i), 
k.push(r)), r.addItemEl(s), e(s);
var o, u = document.getElements(".upsells li").length > 0;
u || (o = document.getElement(".add-to-shave-plan"), o && o.hide()), new Flash("Shave plan created successfully.", "notice");
},
change:function(e) {
var n = _.findWhere(k, {
root_el:t.getParent()
}), i = _.findWhere(k, {
key:e.data.key
}), s = e.data.subscription.interval.replace("Every ", "").replace(" Month", "").replace("s", "").toInt();
s / 30 >= 1 && (s /= 30), i || (group_el = Elements.from(plan_group_template({
key:e.data.key,
next_send:e.data.subscription.next_send,
interval:s
}))[0], document.getElement(".shave-plan.page").getElement("ul").adopt(group_el), 
i = new ShavePlanGroup(group_el), k.push(i)), n !== i && (t.dispose(), n.removeItemEl(t), 
i.addItemEl(t));
},
removed:function(e) {
var n = _.findWhere(k, {
key:e.data.key
});
n.removeItemEl(t), new Flash("Shave plan removed successfully.", "notice");
}
});
}
}
Stripe.setPublishableKey(Harrys.STRIPE_PUBLISHABLE_KEY);
var t = document.getElement(".nav"), n = $("header"), i = function() {
var e = window.getScrollTop(), i = 135, s = u.getCurrentPage().root_el, r = s.getHeight() - n.getHeight(), a = r - t.getHeight(), o = e;
t && !Browser.ie8 && (e > a && (o = a), t.setStyle("top", e > i ? o :i));
};
Harrys.IS_MOBILE || window.addEvents({
scroll:i,
resize:i
});
var s;
if (Harrys.IS_MOBILE) s = $("mobile_back"), s.addEvent("click", function(e) {
e && e.stop(), _.each($$(".page"), function(e) {
e.hide();
}), t.show(), s.hide();
}), _.each(t.getElements(".nav-item"), function(e) {
var n = e.get("data-page"), i = document.getElement('.page[data-name="' + n + '"]');
n && e.addEvent("click", function(e) {
e && e.stop(), t.hide(), i.show(), s.show();
});
}); else {
var r, a = new Breadcrumbs(t, {
disable_crumbs:!1
}), o = _.map($$(".page"), function(e, t) {
return "none" !== e.getStyle("display") && (r = t), new Page(e, {
name:e.get("data-name")
});
}), u = new Book(o, {
current_index:r
});
u.addEvents({
page_change:function(e, t) {
a.changeActive(t);
}
}), a.addEvents({
go_to_index:function(e, t) {
var n = u.findPageByName(t);
u.goToPage(n);
}
});
}
var l = $("details_name"), c = new ProfileForm(l.getElement(".form"), {
name:"user"
}), d = (new NameDetailsSection(l, c), $("details_email")), h = new EmailPasswordForm(d.getElement(".form"), {
name:"user"
}), f = (new EmailPasswordDetailsSection(d, h), $("details_shipping")), p = new AddressForm(f.getElement(".form.shipping_new"), {
name:"shipping_address"
}), m = new CreateShippingDetailsSection(f, p), g = _.map(f.getElements("li"), m.setupShippingSection), v = $("details_billing"), y = new PaymentForm(v.getElement(".form.billing_new.payment")), b = new AddressForm(v.getElement(".form.billing_new.address")), M = new CreateBillingDetailsSection(v, [ y, b ]), w = _.map(v.getElements("li"), M.setupBillingSection), k = _.map(document.getElement(".shave-plan.page").getElements(".plan"), function(e) {
return new ShavePlanGroup(e);
});
_.each(document.getElement(".shave-plan.page").getElements("li"), e), _.each(document.getElement(".history.page").getElements("li:not(.empty)"), function(e) {
var t = (e.get("data-public-id"), e.getElement(".header")), n = e.getElement(".more-detail"), i = n.measure(function() {
return this.setStyle("max-height", ""), this.getSize().y;
});
n.setStyle("display", ""), t.addEvent("click", function() {
n.hasClass("open") ? (e.removeClass("active"), n.removeClass("open").setStyle("max-height", "0")) :(e.addClass("active"), 
n.addClass("open").setStyle("max-height", 3 * i), new Fx.Scroll(window, {
offset:{
y:-40
}
}).toElement(t));
}), e.hasClass("active") && n.addClass("open").setStyle("max-height", 3 * i);
});
var L = document.getElement(".invites.page"), T = L.get("data-available-invites-count").toInt(), E = $("invite_empty"), D = $("invite_create"), x = new ProfileForm(D.getElement(".form"), {
name:"invite"
}), S = new InviteCreateDetailsSection(D, x), Y = $("invite_counter"), C = $("invite_list"), A = C.getElement("table");
_.each(A.getElements("tr.invite"), function(e) {
new Invite(e);
}), S.addEvent("new_invite", function(e) {
var t = --T, n = t + " invite" + (1 === t ? "" :"s");
Y.set("text", n), 0 === t && (D.hide(), E.show());
{
var i = new Element("td.name", {
text:e.invitee_first_name + " " + e.invitee_last_name
}), s = new Element("td.email", {
text:e.invitee_email
}), r = new Element("td.status", {
text:e.state.capitalize()
}).addClass(e.state), a = new Element("tr.invite", {
"data-id":e.id
}).adopt(i, s, r);
new Invite(a);
}
A.getElement("tbody").adopt(a), C.show();
});
});