var Breadcrumbs = new Class({
Implements:[ Events, Options ],
options:{
crumb_selector:".crumb",
disable_crumbs:!0
},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.crumbs = t.getElements(this.options.crumb_selector), 
_.each(this.crumbs, function(t, e) {
t.hasClass("disabled") || t.addEvent("click", function() {
this.fireEvent("go_to_index", [ e, t.get("data-page") ]);
}.bind(this));
}.bind(this));
},
changeActive:function(t) {
if (t >= this.crumbs.length) throw new Error("Index not in range");
_.each(this.crumbs, function(e, i) {
e.removeClass("active"), this.options.disable_crumbs && (t > i ? this.enableCrumb(i) :this.disableCrumb(i));
}.bind(this)), this.crumbs[t].addClass("active");
},
enableCrumb:function(t) {
this.crumbs[t].removeClass("disabled").addEvent("click", function() {
this.fireEvent("go_to_index", t);
}.bind(this));
},
disableCrumb:function(t) {
this.crumbs[t].addClass("disabled").removeEvents("click");
}
}), Page = new Class({
Implements:Events,
initialize:function(t, e) {
this.checks = [], this.root_el = t, this.error_msg_el = this.root_el.getElement(".page-error-msg"), 
this.next_buttons = _.map(this.root_el.getElements("button.next"), function(t) {
return new Button(t);
}), e && (this.hide_order_summary = e.hide_order_summary, this.name = e.name), _.each(this.next_buttons, function(t) {
t.addEvent("click", function() {
_.each(this.next_buttons, function(t) {
t.disable(e.button_loading_text);
}), this.hidePageError(), this.validate(function(t) {
t ? ("string" == typeof t && this.showPageError(t), _.each(this.next_buttons, function(t) {
t.enable();
})) :(this.fireEvent("next"), _.each(this.next_buttons, function(t) {
t.enable();
}));
}.bind(this));
}.bind(this));
}.bind(this));
},
validate:function(t) {
this.checks.length > 0 ? async.series(this.checks, t) :t(null, {
success:!0
});
},
pushValidation:function(t) {
this.checks.push(t);
},
removeValidations:function() {
this.checks = [];
},
showPageError:function(t) {
this.error_msg_el.set("text", t).show(), new Fx.Scroll(window, {
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
initialize:function(t, e) {
this.setOptions(e), this.pages = t, _.each(this.pages, function(t) {
t.addEvents({
next:this.nextPage.bind(this),
go_to:this.goToPage.bind(this)
});
}.bind(this));
},
nextPage:function() {
var t = this.options.current_index + 1;
return t >= this.pages.length ? !1 :(this.goToPage(this.pages[t]), void 0);
},
goToPage:function(t) {
this.pages[this.options.current_index].close(), t.open(), this.options.current_index = this.findPageIndex(t), 
this.fireEvent("page_change", [ t, this.options.current_index ]);
},
findPageIndex:function(t) {
return this.pages.indexOf(t);
},
findPageByName:function(t) {
return _.find(this.pages, function(e) {
return e.name === t;
});
},
getCurrentPage:function() {
return this.pages[this.options.current_index];
}
}), Harrys = Harrys || {}, Modal = new Class({
Implements:Events,
initialize:function(t) {
this.root_el = t, this.frame_el = this.root_el.getElement(".frame"), this.close_el = this.root_el.getElement("span.close"), 
this.close_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.root_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.frame_el.addEvent("click", function(t) {
t.stopPropagation();
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
initialize:function(t) {
this.parent(t), this.message_el = this.root_el.getElement(".message"), this.suggestion_el = this.root_el.getElement(".suggestion"), 
this.ignore_button = new Button(this.root_el.getElement("button.ignore")), this.change_address_button = new Button(this.root_el.getElement("button.continue")), 
this.ignore_button.addEvent("click", function() {
this.close(null, {
success:!0
});
}.bind(this));
},
setupSuggestion:function(t) {
this.message_el.set("text", I18n.t("Modals.AddressModal.setupSuggestion"));
var e = {
address_line_1:t.street1,
address_line_2:t.street2 || "",
city:t.city,
state:t.state,
zip:t.zip,
country:t.country || ""
};
_.each(e, function(t, e) {
var i = this.suggestion_el.getElement('[data-field="' + e + '"]');
i && i.set("text", t);
}.bind(this)), this.suggestion_el.show(), this.change_address_button.setText("Yes! Use this one instead"), 
this.change_address_button.removeEvents("click").addEvent("click", function() {
this.fireEvent("use_suggestion", e), this.close(null, {
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
open:function(t, e) {
this.callback = e, t.returned_address ? this.setupSuggestion(t.returned_address) :this.setupNotFound(), 
this.root_el.show();
},
close:function(t, e) {
this.callback(t, e), this.callback = null, this.root_el.hide();
}
}), GiftModal = new Class({
Extends:Modal,
initialize:function(t) {
if (this.parent(t), this.active = !1, this.checks = [], this.step_one = this.root_el.getElement(".step.one"), 
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
_.each(this.card_els, function(t) {
t.addEvents({
click:function() {
this.chooseCard(t.get("data-id"), t.get("data-image"));
}.bind(this),
mouseenter:function(t) {
_.each(this.card_els, function(e) {
e !== t.target && e.addClass("not-selected");
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
this.add_card_button.disable(), this.validate(function(t) {
this.add_card_button.enable(), t || (this.activate(), this.close());
}.bind(this));
}.bind(this)), this.checks.push(this._checkInputs.bind(this)), 1 === this.card_els.length) {
var e = this.card_els[0];
this.chooseCard(e.get("data-id"), e.get("data-image"));
}
},
back:function() {
this.step_two.hide(), this.step_one.show();
},
validate:function(t) {
this.checks.length > 0 ? async.auto(this.checks, t) :t(null, {
success:!0
});
},
_checkInputs:function(t) {
var e = [];
_.each(this.inputs, function(t) {
t.validate(function(t) {
t && e.push(t);
});
}), e.length > 0 ? t(_.uniq(e)) :t(null, {
success:!0
});
},
chooseCard:function(t, e) {
this.id = t, this.image = e, this.step_one.hide(), this.step_two.show();
},
getGiftInfo:function() {
var t = {
card_id:this.id,
image:this.image
};
return _.each(this.inputs, function(e, i) {
t[i] = e.getValue();
}), t;
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
initialize:function(t) {
this.root_el = t, this.header_el = this.root_el.getElement(".header"), this.heading = this.header_el.getElement("h5"), 
this.back_el = this.header_el.getElement(".back"), this.heading.set("text", "Which card would you like?"), 
this.parent(t), this.back_el.addEvent("click", function() {
this.back();
}.bind(this)), this.step_three = this.root_el.getElement(".step.three"), this.step_two_inputs = {
to_name:this.inputs.to_name,
from_name:this.inputs.from_name,
to_email:this.inputs.to_email
}, this.next_step_button = new Button(this.root_el.getElement("button.continue")), 
this.next_step_button.addEvent("click", function() {
this.next_step_button.disable(), this.partialValidate(this.step_two_inputs, function(t) {
this.next_step_button.enable(), t || (this.step_two.hide(), this.step_three.show(), 
this.heading.set("text", "Add Message"));
}.bind(this));
}.bind(this));
},
back:function() {
this.step_two.isVisible() ? (this.parent(), this.back_el.hide(), this.heading.set("text", "Which card would you like?")) :this.step_three.isVisible() && (this.step_three.hide(), 
this.step_two.show(), this.heading.set("text", "Add Details"));
},
partialValidate:function(t, e) {
async.auto([ function(e) {
var i = [];
_.each(t, function(t) {
t.validate(function(t) {
t && i.push(t);
});
}), i.length > 0 ? e(_.uniq(i)) :e(null, {
success:!0
});
}.bind(this) ], e);
},
chooseCard:function(t, e) {
this.parent(t, e), this.back_el.show(), this.heading.set("text", "Add Details");
},
getGiftInfo:function() {
return info = this.parent(), info.image = info.image.replace("mobile/", ""), info;
},
close:function() {
this.step_three.hide(), this.back_el.hide(), this.parent();
}
}), ProductUnavailableModal = new Class({
Extends:Modal,
initialize:function(t) {
this.parent(t), this.products_table = this.root_el.getElement("table.products"), 
this.return_button = this.root_el.getElement("button.return"), this.continue_button = this.root_el.getElement("button.continue");
},
_setup:function(t, e) {
this.products_table.empty().adopt(_.map(t, function(t) {
return this._productTemplate(t);
}.bind(this))), this.return_button.removeEvents("click").addEvent("click", function() {
_.each(t, function(t) {
Harrys.cart.setQuantity(t.key, 0);
}), Harrys.warn_on_leave = !1, window.location = "/products";
}), this.continue_button.removeEvents("click").addEvent("click", function() {
_.each(t, function(t) {
Harrys.cart.setQuantity(t.key, 0);
}), Harrys.warn_on_leave = !1, window.location.reload(!0);
}), e ? this.continue_button.hide() :this.continue_button.show();
},
_productTemplate:function(t) {
var e = {};
e.name = t.product.name;
var i = [];
t.product.color_slug && "chrome" !== t.product.color_slug && i.push(t.product.color), 
t.product.pack_size && i.push(t.product.pack_size + " Pack"), t.customizations.engraving && i.push(t.customizations.engraving), 
t.customizations.secondary_engraving && i.push(t.customizations.secondary_engraving), 
t.customizations.recipient_email && i.push(t.customizations.recipient_email), e.customizations = i.join(", "), 
e.quantity = t.quantity;
var s = t.customizations.interval;
return s && (s /= 30), e.interval = s ? "Every " + s + " Month" + (s > 1 ? "s" :"") :"", 
e.price = "$" + t.product.price.toInt().toFixed(2), e.total = "$" + (t.product.price * t.quantity).toInt().toFixed(2), 
Elements.from(_.template('<tr class="product"><td class="name"><strong><%= name %></stong><span><%= customizations %></span></td><td class="quantity">Qty: <%= quantity %></td><td class="interval"><%= interval %></td><td class="price"><%= price %></td><td class="total"><%= total %></td></tr>', e));
},
open:function(t, e, i) {
this.callback = i, this._setup(t, e), this.root_el.show();
},
close:function(t, e) {
this.callback && this.callback(t, e), this.callback = null, this.root_el.hide();
}
}), ConfirmModal = new Class({
Implements:[ Events, Options ],
options:{
message_text:"Are you sure you want to do that?",
cancel_text:"No",
continue_text:"Yes"
},
template:_.template('<div class="modal confirm background" style="display: none;"><div class="frame"><span class="close"></span><strong class="message"><%= message_text %></strong><% if (cancel_text) { %><button class="medium sentimental-blue cancel"><%= cancel_text %></button><% } %><% if (continue_text) { %><button class="medium blue continue"><%= continue_text %></button><% } %></div></div>'),
initialize:function(t) {
this.setOptions(t), this.root_el = Elements.from(this.template(this.options))[0], 
this.frame_el = this.root_el.getElement(".frame"), this.close_el = this.root_el.getElement("span.close"), 
this.close_el.addEvent("click", function() {
this.close(!0, !1);
}.bind(this)), this.message_el = this.root_el.getElement(".message");
var e = this.root_el.getElement("button.cancel");
e && (this.cancel_button = new Button(e));
var i = this.root_el.getElement("button.continue");
i && (this.continue_button = new Button(i)), this.cancel_button && this.cancel_button.addEvent("click", function() {
this.close(!0);
}.bind(this)), this.continue_button && this.continue_button.addEvent("click", function() {
this.close(null, {
success:!0
});
}.bind(this));
},
open:function(t) {
this.callback = t, this.root_el.inject(document.getElement("body")).show();
},
close:function(t, e) {
this.callback(t, e), this.callback = null, this.root_el.hide().dispose();
}
}), Harrys = Harrys || {}, AddressForm = new Class({
Implements:[ Events, Options ],
validations:[],
options:{},
disabledAddressTemplate:'<span class="line"><%= name %></span><span class="line"><%= address1 %></span><span class="line"><%= address2 %></span><span class="line"><%= city %>, <%= state %> <%= zip %></span><span class="line"><%= country %></span>',
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.name = this.options.name, this.inputs = {}, 
this.country_toggle = new Toggle(this.root_el.getElement(".country.toggle")), this.country = this.country_toggle.getValue(), 
this.disabledAddressTemplate = _.template(this.disabledAddressTemplate), this.disabledAddressContainer = this.root_el.getParent().getElement(".disabled-address"), 
this._setupInputs(), this.country_toggle.addEvent("change", this._onCountryChange.bind(this)), 
this.inputs.zip.addEvent("change", this._onZipChange.bind(this)), this.inputs.address_line_1.addEvent("change", this._checkForPOBox.bind(this)), 
this.inputs.address_line_2.addEvent("change", this._checkForPOBox.bind(this)), this.inputs.state.addEvent("change", this._checkForPOBox.bind(this)), 
this.addValidation(this._checkInputs.bind(this)), this.addValidation(this._checkProvincePostalCode.bind(this));
},
_setupInputs:function() {
var t = {
required:!0,
appendErrors:!0,
flashMessage:!1
};
this.inputs.name = new Input(this.root_el.getElement("input.name"), t), this.inputs.address_line_1 = new Input(this.root_el.getElement("input.address_line_1"), t), 
this.inputs.address_line_2 = new Input(this.root_el.getElement("input.address_line_2"), {
appendErrors:!0,
flashMessage:!1
}), this.inputs.city = new Input(this.root_el.getElement("input.city"), t), this.inputs.state = new Select(this.root_el.getElement("select.state"), t), 
this.inputs.state.el.addEvent("change", this._onStateChange.bind(this)), this.inputs.zip = new RegexInput(this.root_el.getElement("input.zip"), {
required:!0,
regex:Harrys.zip_format(this.country),
appendErrors:!0,
flashMessage:!1,
capitalize:!0
}), this.root_el.getElement("input.telephone") && (this.inputs.telephone = new PhoneInput(this.root_el.getElement("input.telephone"), t)), 
this.is_po_box = this._isPoBox();
},
_onCountryChange:function(t) {
this.country = t, this.inputs.zip.setPattern(Harrys.COUNTRIES[this.country].zip_pattern), 
this.inputs.zip.setRegex(Harrys.zip_format(this.country)), this.inputs.zip.setPlaceholder(Harrys.COUNTRIES[this.country].zip_label);
var e = "US" === this.country ? "State" :"Province/Territory", i = Object.map(Harrys.COUNTRIES[this.country].states, function(t, e) {
return e;
});
this.inputs.state.replaceOptionEls(e, i), this.fireEvent("country_change", t);
},
_onZipChange:function(t) {
this.zip = t, this.fireEvent("zip_change", this.inputs.zip);
},
_onStateChange:function() {
this.fireEvent("state_change", this.inputs.state.getValue());
},
_isPoBox:function() {
return this._isApoFpo() ? !0 :Harrys.PO_BOX_REGEX.test(this.inputs.address_line_1.getValue()) || Harrys.PO_BOX_REGEX.test(this.inputs.address_line_2.getValue());
},
_checkForPOBox:function() {
this._setPoBox(this._isPoBox());
},
_setPoBox:function(t) {
var e = this.is_po_box;
e != t && (this.is_po_box = t, this.fireEvent("po_box_change"));
},
getAddress:function() {
var t = _.reduce(this.inputs, function(t, e, i) {
return t[i] = e.getValue(), t;
}, {});
return t.is_po_box = this._isPoBox(), t.country = this.country_toggle.getValue(), 
t.country_full = Harrys.COUNTRIES[this.country_toggle.getValue()].full_name, t;
},
getValue:function() {
return this.getAddress();
},
setAddress:function(t) {
return t.country && this.country_toggle.setValue(t.country), _.each(this.inputs, function(e, i) {
t[i] && e.setValue(t[i]).onValidationPass();
}), this;
},
clearInputs:function() {
return _.each(this.inputs, function(t) {
t.setValue("").onValidationPass();
}), this;
},
_isApoFpo:function() {
return _.contains(Harrys.APO_FPO_CODES, this.inputs.state.getValue());
},
validate:function(t) {
this.validations.length > 0 ? async.auto(this.validations, t) :t(null, {
success:!0
});
},
addValidation:function(t) {
this.validations.push(t);
},
_checkInputs:function(t) {
var e = [];
_.each(this.inputs, function(t) {
t.validate(function(t) {
t && e.push(t);
});
}), e.length > 0 ? t(_.uniq(e)) :t(null, {
success:!0
});
},
_checkProvincePostalCode:function(t) {
var e, i;
"CA" == this.country && (e = this.inputs.state.getValue(), i = this.inputs.zip.getValue(), 
_.contains(Harrys.CANADA_POSTAL_PREFIXES[e], i[0]) ? t(null, {
success:!0
}) :(this.inputs.state.onValidationFailure(I18n.t("AddressForm._checkProvincePostalCode.ca_postal_code_mismatch")), 
this.inputs.zip.onValidationFailure(I18n.t("AddressForm._checkProvincePostalCode.ca_province_mismatch")), 
t(I18n.t("AddressForm._checkProvincePostalCode.ca_postal_code_province_mismatch")))), 
t(null, {
success:!0
});
},
enable:function() {
return this.country_toggle.enable(), _.each(this.inputs, function(t) {
t.enable();
}), this;
},
disable:function() {
return this.country_toggle.disable(), _.each(this.inputs, function(t) {
t.disable();
}), this;
},
setDisabledAddress:function(t, e) {
var i = this.disabledAddressTemplate({
name:t.name || t.first_name + " " + t.last_name,
address1:t.address_line_1,
address2:t.address_line_2,
city:t.city,
state:t.state,
zip:t.zip,
country:t.country_full.replace(/\w\S*/g, function(t) {
return t.charAt(0).toUpperCase() + t.substr(1).toLowerCase();
})
});
this.disabledAddressContainer.set("html", i), e && this.disabledAddressContainer.show();
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
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.name = this.options.name, this.inputs = {}, 
this._setupInputs(), this.addValidation(this._checkInputs.bind(this)), this.addValidation(this._checkExpirationDate.bind(this));
},
_setupInputs:function() {
var t = {
required:!0,
appendErrors:!0,
flashMessage:!1
};
_.contains(this.options.disabled_fields, "card_number") || (this.inputs.card_number = new CreditCardInput(this.root_el.getElement("input.card_number"), t)), 
_.contains(this.options.disabled_fields, "month") || (this.inputs.month = new MonthSelect(this.root_el.getElement("select.month"), t)), 
_.contains(this.options.disabled_fields, "year") || (this.inputs.year = new YearSelect(this.root_el.getElement("select.year"), t)), 
_.contains(this.options.disabled_fields, "ccv") || (this.inputs.ccv = new Input(this.root_el.getElement("input.ccv"), t)), 
_.each(this.options.disabled_fields, function(t) {
this.root_el.getElement("." + t).set("disabled", !0);
}, this);
},
getData:function() {
return _.reduce(this.inputs, function(t, e, i) {
return t[i] = e.getValue(), t;
}, {});
},
getValue:function() {
return this.getData();
},
setData:function(t) {
_.each(this.inputs, function(e, i) {
t[i] && e.setValue(t[i]);
});
},
clearInputs:function() {
_.each(this.inputs, function(t) {
t.clear();
});
},
validate:function(t) {
this.validations.length > 0 ? async.auto(this.validations, t) :t(null, {
success:!0
});
},
addValidation:function(t) {
this.validations.push(t);
},
_checkInputs:function(t) {
var e = [];
_.each(this.inputs, function(t) {
t.validate(function(t) {
t && e.push(t);
});
}), e.length > 0 ? t(_.uniq(e)) :t(null, {
success:!0
});
},
_checkExpirationDate:function(t) {
var e = this.inputs.month.getValue().toInt(), i = this.inputs.year.getValue().toInt(), s = moment();
i === s.year() && e < s.month() + 1 ? (this.inputs.month.onValidationFailure(I18n.t("PaymentForm._checkExpirationDate.error")), 
this.inputs.year.onValidationFailure(I18n.t("PaymentForm._checkExpirationDate.error")), 
t(I18n.t("PaymentForm._checkExpirationDate.error"))) :t(null, {
success:!0
});
}
}), BillingProfile = new Class({
initialize:function(t) {
this.data = t;
},
toStripeFormat:function() {
var t = this.data.billing_profile;
return {
number:t.card_number,
cvc:t.ccv.replace(/\D+/, ""),
exp_month:t.month,
exp_year:t.year,
name:t.name,
address_line1:t.address_line_1,
address_line2:t.address_line_2,
address_city:t.city,
address_state:t.state,
address_zip:t.zip,
address_country:t.country
};
}
}), DetailsSection = new Class({
Implements:[ Events, Options ],
options:{
validation_success_message:"Details saved successfully"
},
$validations:[],
initialize:function(t, e, i) {
this.setOptions(i), this.root_el = t, this.forms = _.isArray(e) ? e :[ e ], this.show_view = this.root_el.getElement(".view.show"), 
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
var s = this.root_el.getElement("button");
s && (this.button = new Button(s), this.button.addEvent("click", function() {
this.button.disable(), this.validate(function(t, e) {
e = e || {}, e.msg = e.msg || this.options.validation_success_message, t ? (t.message ? new Flash(t.message, "error") :t.messages && _.each(t.messages, function(t) {
new Flash(t, "error");
}), this.button.enable()) :(new Flash(e.msg, "notice"), this.form_view && this.show_view && (this.form_view.hide(), 
this.show_view.show()), this.button.enable());
}.bind(this));
}.bind(this))), _.each(this.forms, function(t) {
this.addValidation(t.validate.bind(t));
}.bind(this)), this.addValidation(this.request.bind(this));
},
request:function(t) {
t(null, {
success:!0
});
},
_sendRequest:function(t, e, i) {
new SignedRequest.JSON({
url:t,
data:e,
onSuccess:function(t) {
t.success ? this._success(t, i) :this._error(t, i);
}.bind(this),
onFailure:function(t) {
this._failure(t, i);
}.bind(this)
}).send();
},
_success:function(t, e) {
e(null, t);
},
_error:function(t, e) {
var i = _.map(t.errors, function(t) {
var e;
switch (t.type) {
case "validation":
e = t.field.replace("_", " ") + " " + t.message, e.capitalize();
break;

default:
e = t.message ? t.message :t;
}
return e;
});
e({
messages:i
});
},
_failure:function(t, e) {
var i = I18n.t("global.error.cannot_connect_try_again");
new Flash(i, "error"), e && e(i);
},
setFields:function(t) {
return _.each(t, function(t, e) {
var i = this.root_el.getElement('[data-field-name="' + e + '"]');
i && i.set("text", t);
}.bind(this)), this;
},
validate:function(t) {
this.$validations.length > 0 ? async.series(this.$validations, t) :t(null, {
success:!0
});
},
addValidation:function(t) {
this.$validations.push(t);
}
}), NameDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/UserService/updateName",
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return t[e.name] = e.getValue(), t;
}, {});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
this.setFields({
name:t.data.first_name + " " + t.data.last_name
}), e(null, t);
}
}), EmailPasswordDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/UserService/updateEmailPassword",
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return t[e.name] = e.getValue(), t;
}, {});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
this.setFields(t.data), e(null, t);
}
}), ShippingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/ShippingAddressService/updateShippingAddressById",
initialize:function(t, e, i) {
this.parent(t, e, i), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this shipping address.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(t) {
var e;
t || (e = new SignedRequest.JSON({
url:"/api/v1/ShippingAddressService/removeShippingAddressById",
data:{
id:this.id
},
onSuccess:function(t) {
t.success ? (this.fireEvent("removed", {
data:t.data,
section:this
}), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(t) {
this._failure(t);
}.bind(this)
}), e.send());
}.bind(this));
}.bind(this));
},
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return t[e.name] = e.getValue(), t;
}, {
id:this.id
});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
var i = this.id;
this.id = t.data.id, t.data.address.name = t.data.address.name, this.setFields(t.data.address), 
this.root_el.set("data-id", this.id), this.fireEvent("changed", {
data:t.data,
section:this,
old_id:i
}), e(null, t);
}
}), CreateShippingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/ShippingAddressService/create",
request:function(t) {
var e = {};
_.each(this.forms, function(t) {
e[t.name] = t.getValue();
}), this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
t.data.address.id = t.data.id;
var i = Elements.from(shipping_address_template(t.data.address))[0], s = this.setupShippingSection(i);
_.each(this.forms, function(t) {
t.clearInputs();
}), this.root_el.getElement("ul").adopt(i), this.fireEvent("created", {
data:t.data,
section:s
}), e(null, t);
},
setupShippingSection:function(t) {
var e = t.get("data-id"), i = new AddressForm(t.getElement(".form.shipping_" + e), {
name:"shipping_address"
});
return new ShippingDetailsSection(t, i);
}
}), BillingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/BillingProfileService/updateBillingProfileById",
initialize:function(t, e, i) {
this.parent(t, e, i), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this billing profile.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(t) {
var e;
t || (e = new SignedRequest.JSON({
url:"/api/v1/BillingProfileService/removeBillingProfileById",
data:{
id:this.id
},
onSuccess:function(t) {
t.success ? (this.fireEvent("removed", {
data:t.data,
section:this
}), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(t) {
this._failure(t);
}.bind(this)
}), e.send());
}.bind(this));
}.bind(this));
},
request:function(t) {
{
var e = _.reduce(this.forms, function(t, e) {
return t.billing_profile = _.extend(t.billing_profile, e.getValue()), t;
}, {
billing_profile:{}
});
new BillingProfile(e);
}
this._sendRequest(this.url, {
id:this.id,
billing_profile:e.billing_profile
}, t);
},
_success:function(t, e) {
var i = this.id;
this.id = t.data.id, t.data.card_number = "XXXX" + t.data.card_number.substr(-4), 
this.setFields(t.data), this.root_el.set("data-id", t.data.id), this.fireEvent("changed", {
data:t.data,
section:this,
old_id:i
}), e(null, t);
}
}), CreateBillingDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/v1/BillingProfileService/create",
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return t.billing_profile = _.extend(t.billing_profile, e.getValue()), t;
}, {
billing_profile:{}
}), i = new BillingProfile(e);
Stripe.card.createToken(i.toStripeFormat(), function(e, i) {
i.error ? t(i.error) :this._sendRequest(this.url, {
billing_profile:{
stripe_card_token:i.id
}
}, t);
}.bind(this));
},
_success:function(t, e) {
t.data.number = "XXXX" + t.data.card_number.substr(-4);
var i = Elements.from(billing_profile_template(t.data))[0], s = this.setupBillingSection(i);
_.each(this.forms, function(t) {
t.clearInputs();
}), this.root_el.getElement("ul").adopt(i), this.fireEvent("created", {
data:t.data,
section:s
}), e(null, t);
},
setupBillingSection:function(t) {
var e = t.get("data-id"), i = t.getElement(".form.payment.billing_" + e), s = t.getElement(".form.address.billing_" + e), n = [];
return i && n.push(new PaymentForm(i, {
disabled_fields:[ "ccv", "card_number" ]
})), s && n.push(new AddressForm(s)), new BillingDetailsSection(t, n);
}
}), ShavePlanDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/SubscriptionService/modifySubscription",
initialize:function(t, e, i) {
this.parent(t, e, i), this.id = this.root_el.get("data-id"), this.remove_el = this.root_el.getElement(".link.remove"), 
this.remove_el && this.remove_el.addEvent("click", function() {
new ConfirmModal({
message_text:"You're about to remove this Shave Plan.<br>Are you sure you want to remove it?",
cancel_text:"No, Do Not Remove It",
continue_text:"Yes, Remove It"
}).open(function(t) {
var e;
t || (e = new SignedRequest.JSON({
url:"/api/SubscriptionService/cancelSubscription",
data:{
subscription_id:this.id
},
onSuccess:function(t) {
t.success ? (this.fireEvent("removed", t), this.root_el.dispose()) :window.location.reload();
}.bind(this),
onFailure:function(t) {
this._failure(t);
}.bind(this)
}), e.send());
}.bind(this));
}.bind(this));
},
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return _.extend(t, e.getValue());
}, {
subscription_id:this.id
});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
t.data.subscription.interval = "Every " + t.data.subscription.interval / 30 + " Month" + (t.data.subscription.interval / 30 === 1 ? "" :"s"), 
t.data.subscription.next_send = moment(t.data.subscription.next_send, "YYYY-MM-DD").format("D MMMM, YYYY"), 
this.setFields(t.data.subscription), this.fireEvent("change", t), e(null, t);
}
}), ShavePlanCreateDetailsSection = new Class({
Extends:DetailsSection,
url:"/api/SubscriptionService/createSubscription",
initialize:function(t, e, i) {
this.parent(t, e, i), this.id = this.root_el.get("data-viewable-product-id");
},
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return _.extend(t, e.getValue());
}, {
subscription_viewable_product_id:this.id
});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
this.root_el.destroy(), this.fireEvent("created", t), e(t);
}
}), ShavePlanGroup = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.key = this.root_el.get("id"), this.items = this.root_el.getElements("li");
},
findItem:function(t) {
return _.find(this.items, t);
},
filterItems:function(t) {
return _.filter(this.items, t);
},
addItemEl:function(t) {
return this.root_el.adopt(t), this.items.push(t), this.root_el.show(), this;
},
removeItemEl:function(t) {
return this.items = _.without(this.items, t), 0 === this.items.length && this.root_el.hide(), 
this;
}
}), InviteCreateDetailsSection = new Class({
Extends:DetailsSection,
options:{
validation_success_message:"Invite Sent Successfully"
},
url:"/api/InviteService/inviteByEmail",
request:function(t) {
var e = _.reduce(this.forms, function(t, e) {
return _.extend(t, e.getValue()), t;
}, {});
this._sendRequest(this.url, e, t);
},
_success:function(t, e) {
_.each(this.forms, function(t) {
t.unsetValue(), t.removeInput("referrer_first_name"), t.removeInput("referrer_last_name");
}), this.fireEvent("new_invite", t.data), e(null, t);
}
}), ProfileForm = new Class({
Implements:[ Events, Options ],
options:{},
$validations:[],
inputs:{},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.name = this.root_el.get("name") || this.options.name, 
this._setupInputs(), this.addValidation(this._checkInputs.bind(this));
},
_setupInputs:function() {
this.inputs = _.reduce(this.root_el.getElements(".field input"), function(t, e) {
var i = new Input(e, {
required:"false" !== e.get("data-required"),
flashMessage:!1,
appendErrors:!0
});
return t[i.name] = i, t;
}.bind(this), {});
},
getValue:function() {
return _.reduce(this.inputs, function(t, e) {
return t[e.name] = e.getValue(), t;
}.bind(this), {});
},
setValue:function(t) {
return _.each(this.inputs, function(e, i) {
t[i] && e.setValue(t[i]).onValidationPass();
}), this;
},
unsetValue:function() {
return _.each(this.inputs, function(t) {
t.setValue("").onValidationPass();
}), this;
},
validate:function(t) {
this.$validations.length > 0 ? async.series(this.$validations, t) :t(null, {
success:!0
});
},
addValidation:function(t) {
this.$validations.push(t);
},
removeValidation:function(t) {
var e = this.$validations.indexOf(t);
-1 !== e && delete this.$validations[e];
},
_checkInputs:function(t) {
var e = [];
_.each(this.inputs, function(t) {
t.validate(function(t) {
t && e.push(t);
});
}), e.length > 0 ? t(_.uniq(e)) :t(null, {
success:!0
});
},
removeInput:function(t) {
var e = this.inputs[t];
e && (delete this.inputs[t], e.el.dispose());
},
enable:function() {
return _.each(this.inputs, function(t) {
t.enable();
}), this;
},
disable:function() {
return _.each(this.inputs, function(t) {
t.disable();
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
}), _.each(this.inputs, function(t) {
this.addValidation(t.validate.bind(t));
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
var t = this.root_el.getElement(".shipping select");
t && (this.inputs.shipping_id = new Select(t));
var e = this.root_el.getElement(".billing select");
e && (this.inputs.billing_id = new Select(e)), this.inputs.quantity.addEvent("change", function(t) {
this.fireEvent("quantity_change", t);
}.bind(this));
},
updateSelectOption:function(t, e, i, s) {
var n = this.inputs[t];
return n && n.updateOptionEl(e, i, s), this;
},
addSelectOption:function(t, e, i, s) {
var n = this.inputs[t];
return n && n.addOptionEl(e, i, s), this;
},
removeSelectOption:function(t, e) {
var i = this.inputs[t];
return i && i.removeOptionEl(e), this;
}
}), Invite = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.id = this.root_el.get("data-id");
}
}), address_form_html = '<div class="form address <%= form_type %>_<%= id %> grid"><div class="toggle country col-1-1"><div><input type="radio" name="<%= form_type %>_<%= id %>[country]" value="US" id="<%= form_type %>_<%= id %>_country_us" <% if (!country || country==="US") { %> checked <% } %>><label for="<%= form_type %>_<%= id %>_country_us" class="us"><span class="img"></span> United States</label></div><div><input type="radio" name="<%= form_type %>_<%= id %>[country]" value="CA" id="<%= form_type %>_<%= id %>_country_ca" <% if (country==="CA") { %> checked <% } %>><label for="<%= form_type %>_<%= id %>_country_ca" class="ca"><span class="img"></span> Canada</label></div></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_name" class="for-ie">Name</label><input id="<%= form_type %>_<%= id %>_name" type="text" placeholder="Name" name="<%= form_type %>_<%= id %>[name]" class="name" maxlength="100" value="<%= name %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_address_line_1" class="for-ie">Address Line 1</label><input id="<%= form_type %>_<%= id %>_address_line_1" type="text" placeholder="Address" name="<%= form_type %>_<%= id %>[address_line_1]" class="address_line_1" maxlength="30" value="<%= address_line_1 %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_address_line_2" class="for-ie">Address Line 2</label><input id="<%= form_type %>_<%= id %>_address_line_2" type="text" placeholder="Apt / Suite #" name="<%= form_type %>_<%= id %>[address_line_2]" class="address_line_2" maxlength="255" value="<%= address_line_2 %>"></div><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_city" class="for-ie">City</label><input id="<%= form_type %>_<%= id %>_city" type="text" placeholder="City" name="<%= form_type %>_<%= id %>[city]" class="city" maxlength="255" value="<%= city %>"></div><div class="col-1-2 pad-r"><label for="<%= form_type %>_<%= id %>_state" class="for-ie">State</label><select id="<%= form_type %>_<%= id %>_state" name="<%= form_type %>_<%= id %>[state]" class="state"><option value="" disabled <%= (!state) ? "selected" : "" %>>State</option><% _.each(Harrys.COUNTRIES[country].states, function (state_name, state_code) { %><option value="<%= state_code %>" <%= (state===state_code) ? "selected" : "" %>><%= state_code %></option><% }); %></select></div><div class="col-1-2 pad-l"><label for="<%= form_type %>_<%= id %>_zip" class="for-ie">Zip/Postal</label><input id="<%= form_type %>_<%= id %>_zip" type="text" value="<%= zip %>" placeholder="<%= Harrys.COUNTRIES[country].zip_label %>" pattern="<%= Harrys.COUNTRIES[country].zip_pattern %>" name="<%= form_type %>_<%= id %>[zip]" class="zip" maxlength="11"></div><% if (form_type.indexOf("shipping") === 0) { %><div class="col-1-1"><label for="<%= form_type %>_<%= id %>_telephone" class="for-ie">Telephone</label><input id="<%= form_type %>_<%= id %>_telephone" type="text" value="<%= telephone %>" placeholder="Telephone" pattern="\\d*" name="<%= form_type %>_<%= id %>[telephone]" class="telephone" maxlength="20"></div><% } %><button class="blue medium">Save</button></div>', payment_form_html = '<div class="form payment <%= form_type %>_<%= id %> grid"><div class="col-1-1"><p class="h6 black-blue">Credit / Debit Card Number</p><label for="<%= form_type %>_card_number" style="display: none;">Card Number</label><input id="<%= form_type %>_card_number" type="text" name="<%= form_type %>_<%= id %>[card_number]" placeholder="Card Number" class="card_number" value="<%= card_number %>"></div><div class="col-2-3 grid pad-r"><p class="black-blue col-1-1">Expiration Date</p><div class="col-1-2 pad-r"><label for="<%= form_type %>_month" style="display: none;">Month</label><select class="month" id="<%= form_type %>_month" name="<%= form_type %>_<%= id %>[month]"><% _(12).times(function(i){i++; %><option <%= month === i ? "selected" : "" %> value="<%= i %>"><%= ("0" + i).slice(-2) %></option><% }); %></select></div><div class="col-1-2 pad-l"><label for="<%= form_type %>_year" style="display: none;">Year</label><select class="year" id="<%= form_type %>_year" name="billing_new[year]"><% for (var y=moment().year(); y<(moment().year()+10); y++) { %><option <%= year === y ? "selected" :  "" %> value="<%= y %>"><%= y %></option><% } %></select></div></div><div class="col-1-3 pad-l"><p class="black-blue">Security Code</p><label for="<%= form_type %>_ccv" style="display: none;">CCV</label><input id="<%= form_type %>_ccv" type="text" class="ccv" name="<%= form_type %>_<%= id %>[ccv]" placeholder="CCV" value="XXX"></div></div>', Harrys = Harrys || {}, shipping_address_html = '<li data-id="<%= id %>"><div class="show view"><p><span data-field-name="name"><%= name %></span></p><p><span data-field-name="address_line_1"><%= address_line_1 %></span> <span data-field-name="address_line_2"><%= address_line_2 %></span></p><p><span data-field-name="city"><%= city %></span> <span data-field-name="state"><%= state%></span>, <span data-field-name="zip"><%= zip %></span></p><div class="right table"><div class="middle"><span class="link edit">Edit</span><br><span class="link remove">Remove</span></div></div></div><div class="form view" style="display: none;"><% var form_type = "shipping"; %>' + address_form_html + '<div class="right"><span class="link cancel">Cancel</span></div></div></li>', billing_profile_html = '<li data-id="<%= id %>"><div class="show view"><p><span data-field-name="name"><%= name %></span> </p><p><span data-field-name="card_number"><%= card_number %></span></p><p><span data-field-name="address_line_1"><%= address_line_1 %></span> <span data-field-name="address_line_2"><%= address_line_2 %></span></p><p><span data-field-name="city"><%= city %></span> <span data-field-name="state"><%= state %></span>, <span data-field-name="zip"><%= zip %></span></p><div class="right table"><div class="middle"><span class="link edit">Edit</span><br><span class="link remove">Remove</span></div></div></div><div class="form view" style="display: none;"><% var form_type = "billing"; %>' + payment_form_html + address_form_html + '<div class="right table"><div class="middle"><span class="link cancel">Cancel</span></div></div></div></li>', shipping_address_template = _.template(shipping_address_html), billing_profile_template = _.template(billing_profile_html), ns_format = Harrys.IS_MOBILE ? "MM/DD/YYYY" :"D MMMM, YYYY", shave_plan_html = '<li data-id="<%= id %>" data-viewable-product-id="<%= product.id %>"><div class="view show clear"><img src="<%= product.shave_plan_grey_image %>" class="product-image grey"><img src="<%= product.shave_plan_white_image %>" class="product-image white"><section><h3><%= product.name %></h3><% if (product.pack_size) { %><span><%= product.pack_size %> Pack</span><br><% } %><% if (product.tube_size) { %><span><%= product.tube_size %></span><br><% } %><span class="total">$<%= (product.price * quantity) %>.00</span><span class="price-per">(<%= (product.pack_size) ? "$" + (product.price/product.pack_size) + ".00 per blade" : "$" + (product.price) + "0 each" %>)</span><div class="right"><span class="link edit">Edit</span></div></section><section class="clear"><label class="float-left">Quantity</label><span class="float-right quantity" data-field-name="quantity"><%= quantity %></span></section><section class="clear"><label class="float-left">Ships</label><span class="float-right interval" data-field-name="interval">Every <%= interval / 30 %> Month<%= (interval!==30) ? "s" : "" %></span></section><section class="clear"><label class="float-left">Next Shipment</label><span class="float-right next-send" data-field-name="next_send"><%= moment(next_send).format("' + ns_format + '") %></span></section></div><div class="view form clear" style="display: none;"><img src="<%= product.shave_plan_white_image %>" class="product-image"><section><h3><%= product.name %></h3><% if (product.pack_size) { %><span><%= product.pack_size %> Pack</span><br><% } %><% if (product.tube_size) { %><span><%= product.tube_size %></span><br><% } %><span class="total">$<%= (product.price * quantity) %>.00</span><span class="price-per">(<%= (product.pack_size) ? "$" + (product.price/product.pack_size) + ".00 per blade" : "$" + (product.price) + "0 each" %>)</span><div class="right"><span class="link cancel">Cancel</span></div></section><section class="quantity clear"><label class="float-left">Quantity</label><div class="float-right quantity"><input type="text" value="<%= quantity %>" name="subscription_quantity"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><section class="clear"><label class="float-left">Ships</label><div class="float-right interval"><span class="text">Every <%= interval / 30 %> Month<%= (interval!==30) ? "s" : "" %></span><input type="hidden" value="<%= interval / 30 %>" name="subscription_interval"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><section class="clear"><label class="float-left">Next Shipment</label><div class="float-right next-send"><span class="text"><%= moment(next_send).format("' + ns_format + '") %></span><input type="hidden" value="<%= next_send %>" name="subscription_next_send"><span class="decrease"><span class="h"></span></span><span class="increase"><span class="v"></span><span class="h"></span></span></div></section><div class="clear"><button class="float-left blue medium">Save Changes</button><span class="float-right link remove">Remove</span></div></div></li>', shave_plan_template = _.template(shave_plan_html), plan_group_html = '<div class="plan" id="<%= key %>"><div class="plan-header"><h2>Ships Every <%= interval %> Month<% if (interval!==1) { %>s<% } %></h2><p>Next Shipment &mdash; <%= moment(next_send).format("D MMMM, YYYY") %></p></div></div>';

plan_group_template = _.template(plan_group_html), window.addEvent("domready", function() {
function t(e) {
if (!e.hasClass("empty")) {
var i, s = Harrys.productsManager.findById(e.get("data-viewable-product-id")), n = new ShavePlanForm(e.getElement(".form.view"));
i = "new" === e.get("data-id") ? new ShavePlanCreateDetailsSection(e, n) :new ShavePlanDetailsSection(e, n), 
f.addEvents({
created:function(t) {
var e = t.section.id, i = t.data.address.address_line_1;
n.addSelectOption("shipping_id", i, e);
}.bind(this)
}), _.each(v, function(t) {
t.addEvents({
changed:function(t) {
var e = t.old_id, i = t.data.address.address_line_1, s = {
value:t.data.id
};
n.updateSelectOption("shipping_id", i, e, s);
},
removed:function(t) {
n.removeSelectOption("shipping_id", t.section.id);
}
});
}), E.addEvents({
created:function(t) {
var e = t.section.id, i = t.data.card_number;
n.addSelectOption("billing_id", i, e);
}.bind(this)
}), _.each(w, function(t) {
t.addEvents({
changed:function(t) {
var e = t.old_id, i = t.data.card_number, s = {
value:t.data.id
};
n.updateSelectOption("billing_id", i, e, s);
},
removed:function(t) {
n.removeSelectOption("billing_id", t.section.id);
}
});
}), n.addEvents({
quantity_change:function(t) {
_.each(e.getElements(".total"), function(e) {
e.set("text", "$" + s.price * t + ".00");
});
}
}), i.addEvents({
created:function(e) {
var i = e.data.subscription || {};
i.product = Harrys.productsManager.find({
id:e.data.viewable_product_id
});
var s, n = Elements.from(shave_plan_template(i))[0], a = _.findWhere(S, {
key:e.data.key
}), o = i.interval;
o / 30 >= 1 && (o /= 30), a || (s = Elements.from(plan_group_template({
key:e.data.key,
next_send:i.next_send,
interval:o
}))[0], document.getElement(".shave-plan.page").getElement("ul").adopt(s), a = new ShavePlanGroup(s), 
S.push(a)), a.addItemEl(n), t(n);
var l, r = document.getElements(".upsells li").length > 0;
r || (l = document.getElement(".add-to-shave-plan"), l && l.hide()), new Flash("Shave plan created successfully.", "notice");
},
change:function(t) {
var i = _.findWhere(S, {
root_el:e.getParent()
}), s = _.findWhere(S, {
key:t.data.key
}), n = t.data.subscription.interval.replace("Every ", "").replace(" Month", "").replace("s", "").toInt();
n / 30 >= 1 && (n /= 30), s || (group_el = Elements.from(plan_group_template({
key:t.data.key,
next_send:t.data.subscription.next_send,
interval:n
}))[0], document.getElement(".shave-plan.page").getElement("ul").adopt(group_el), 
s = new ShavePlanGroup(group_el), S.push(s)), i !== s && (e.dispose(), i.removeItemEl(e), 
s.addItemEl(e));
},
removed:function(t) {
var i = _.findWhere(S, {
key:t.data.key
});
i.removeItemEl(e), new Flash("Shave plan removed successfully.", "notice");
}
});
}
}
Stripe.setPublishableKey(Harrys.STRIPE_PUBLISHABLE_KEY);
var e = document.getElement(".nav"), i = $("header"), s = function() {
var t = window.getScrollTop(), s = 135, n = r.getCurrentPage().root_el, a = n.getHeight() - i.getHeight(), o = a - e.getHeight(), l = t;
e && !Browser.ie8 && (t > o && (l = o), e.setStyle("top", t > s ? l :s));
};
Harrys.IS_MOBILE || window.addEvents({
scroll:s,
resize:s
});
var n;
if (Harrys.IS_MOBILE) n = $("mobile_back"), n.addEvent("click", function(t) {
t && t.stop(), _.each($$(".page"), function(t) {
t.hide();
}), e.show(), n.hide();
}), _.each(e.getElements(".nav-item"), function(t) {
var i = t.get("data-page"), s = document.getElement('.page[data-name="' + i + '"]');
i && t.addEvent("click", function(t) {
t && t.stop(), e.hide(), s.show(), n.show();
});
}); else {
var a, o = new Breadcrumbs(e, {
disable_crumbs:!1
}), l = _.map($$(".page"), function(t, e) {
return "none" !== t.getStyle("display") && (a = e), new Page(t, {
name:t.get("data-name")
});
}), r = new Book(l, {
current_index:a
});
r.addEvents({
page_change:function(t, e) {
o.changeActive(e);
}
}), o.addEvents({
go_to_index:function(t, e) {
var i = r.findPageByName(e);
r.goToPage(i);
}
});
}
var d = $("details_name"), c = new ProfileForm(d.getElement(".form"), {
name:"user"
}), u = (new NameDetailsSection(d, c), $("details_email")), h = new EmailPasswordForm(u.getElement(".form"), {
name:"user"
}), p = (new EmailPasswordDetailsSection(u, h), $("details_shipping")), m = new AddressForm(p.getElement(".form.shipping_new"), {
name:"shipping_address"
}), f = new CreateShippingDetailsSection(p, m), v = _.map(p.getElements("li"), f.setupShippingSection), g = $("details_billing"), b = new PaymentForm(g.getElement(".form.billing_new.payment")), y = new AddressForm(g.getElement(".form.billing_new.address")), E = new CreateBillingDetailsSection(g, [ b, y ]), w = _.map(g.getElements("li"), E.setupBillingSection), S = _.map(document.getElement(".shave-plan.page").getElements(".plan"), function(t) {
return new ShavePlanGroup(t);
});
_.each(document.getElement(".shave-plan.page").getElements("li"), t), _.each(document.getElement(".history.page").getElements("li:not(.empty)"), function(t) {
var e = (t.get("data-public-id"), t.getElement(".header")), i = t.getElement(".more-detail"), s = i.measure(function() {
return this.setStyle("max-height", ""), this.getSize().y;
});
i.setStyle("display", ""), e.addEvent("click", function() {
i.hasClass("open") ? (t.removeClass("active"), i.removeClass("open").setStyle("max-height", "0")) :(t.addClass("active"), 
i.addClass("open").setStyle("max-height", 3 * s), new Fx.Scroll(window, {
offset:{
y:-40
}
}).toElement(e));
}), t.hasClass("active") && i.addClass("open").setStyle("max-height", 3 * s);
});
var x = document.getElement(".invites.page"), k = x.get("data-available-invites-count").toInt(), I = $("invite_empty"), C = $("invite_create"), P = new ProfileForm(C.getElement(".form"), {
name:"invite"
}), z = new InviteCreateDetailsSection(C, P), V = $("invite_counter"), F = $("invite_list"), q = F.getElement("table");
_.each(q.getElements("tr.invite"), function(t) {
new Invite(t);
}), z.addEvent("new_invite", function(t) {
var e = --k, i = e + " invite" + (1 === e ? "" :"s");
V.set("text", i), 0 === e && (C.hide(), I.show());
{
var s = new Element("td.name", {
text:t.invitee_first_name + " " + t.invitee_last_name
}), n = new Element("td.email", {
text:t.invitee_email
}), a = new Element("td.status", {
text:t.state.capitalize()
}).addClass(t.state), o = new Element("tr.invite", {
"data-id":t.id
}).adopt(s, n, a);
new Invite(o);
}
q.getElement("tbody").adopt(o), F.show();
});
});