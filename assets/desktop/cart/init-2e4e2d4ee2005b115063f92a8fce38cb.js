var Row = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.quantityEl = this.rootEl.getElement(".quantity").getElement("input"), 
this.priceEl = this.rootEl.getElement(".price .amount"), this.removeEl = this.rootEl.getElement(".remove"), 
this.key = this.rootEl.get("data-key"), this.id = this.rootEl.get("data-id"), this.pricePer = this.rootEl.get("data-price-per").toInt(), 
this.quantity = this.quantityEl.get("value").toInt(), this.removeEl && this.removeEl.addEvent("click", function() {
this._remove();
}.bind(this)), this.quantityEl && (this.quantityInput = new QuantityInput(this.quantityEl), 
this.quantityInput.addEvents({
change:function(t) {
return 1 > t ? (this.quantityEl.set("value", 1), void 0) :(this.quantity = t, this._changeQuantity(), 
void 0);
}.bind(this)
}));
},
_remove:function() {
this.quantity = 0, Harrys.cart.setQuantity(this.key, 0), this.fireEvent("removed");
},
_changeQuantity:function() {
Harrys.cart.setQuantity(this.key, this.quantity, {
no_show_mini_cart:!0
}), this.fireEvent("quantity_changed");
},
updateRowInfo:function(t) {
this.quantity = t.quantity, this.quantityEl.set("value", t.quantity);
var e = this.quantity * this.pricePer;
this.priceEl.set("text", "$" + e.toFixed(2));
},
hide:function() {
this.rootEl.hide();
}
}), Table = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.rowEls = this.rootEl.getElements("tr.product"), this.rows = [], 
this._build(), Harrys.cart.addEvents({
item_changed:this._onItemChanged.bind(this),
item_removed:this._onItemRemoved.bind(this)
});
},
append:function(t) {
var e = new Row(t);
e.addEvents({
removed:this._onRowChange,
quantity_changed:this._onRowChange
}), this.rows.push(e);
},
_build:function() {
_.each(this.rowEls, function(t) {
this.append(t);
}.bind(this));
},
_onItemRemoved:function(t) {
var e = _.findWhere(this.rows, {
key:t.key
});
e && e.hide();
},
_onItemChanged:function(t) {
var e = _.findWhere(this.rows, {
key:t.key
});
e && e.updateRowInfo(t);
},
_onRowChange:function() {
this.fireEvent("change");
}
}), Footer = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.subtotalEl = this.rootEl.getElement("#subtotal"), this.discountEl = this.rootEl.getElement("#discount");
},
updateSubtotal:function() {
this.discountEl && window.location.reload(), this.subtotalEl.set("text", "$" + Harrys.cart.getSubtotal().toFixed(2));
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
}), HeroSection = new Class({
Implements:[ Events, Options ],
initialize:function(t) {
this.root_el = t, this.hero_image_els = this.root_el.getElements(".product-hero"), 
this.galleries = [], this.slideshows = [], this.modifiers = this.root_el.get("data-modifiers") ? this.root_el.get("data-modifiers").split(";") :[], 
_.each(this.hero_image_els, function(t) {
switch (t.get("data-hero-type")) {
case "image":
break;

case "360":
break;

case "slideshow":
this.initSlideshow(t.getElement("ul"));
break;

case "upsell":
break;

case "gallery":
this.initGallery(t.getElement("ul"));
}
}.bind(this));
},
changeHeroByCartItem:function(t) {
var e = this.getCurrentHeroEl(), i = this.getHeroElById(t.product.id);
e.set("data-current-hero", !1).removeClass("active"), i.set("data-current-hero", !0).addClass("active"), 
this.preloadGalleryImages(t.product);
},
initSlideshow:function(t) {
var e = t.getParent().getElement(".arrow.left"), i = t.getParent().getElement(".arrow.right"), s = new SlideShow(t, {
transition:"crossFade",
duration:400,
autoplay:!1
});
e.addEvent("click", function() {
_.each(this.slideshows, function(t) {
t.show("previous");
});
}.bind(this)), i.addEvent("click", function() {
_.each(this.slideshows, function(t) {
t.show("next");
});
}.bind(this)), this.slideshows.push(s);
},
initGallery:function(t) {
var e = new ImageGallery(t);
e.addEvents({
change:function(t) {
_.each(this.galleries, function(e) {
e.changeActiveImageById(t.id, {
no_event:!0
});
}), this.preloadGalleryImages(Harrys.productsManager.findById(t.product_id));
}.bind(this)
}), this.galleries.push(e);
},
getHeroType:function(t) {
return Harrys.IS_MOBILE || !this.hero_image_els.filter('[data-hero-type="' + t + '"]').length ? this.hero_image_els.get("data-hero-type")[0] :t;
},
getCurrentHeroEl:function() {
return _.find(this.hero_image_els, function(t) {
return "true" === t.get("data-current-hero");
});
},
getHeroElByType:function(t) {
return _.find(this.hero_image_els, function(e) {
return e.get("data-hero-type") === t;
});
},
getHeroElById:function(t) {
return _.find(this.hero_image_els, function(e) {
return e.get("data-hero-id").toInt() === t.toInt();
});
},
preloadGalleryImages:function(t) {
var e = _.find(this.galleries, function(e) {
return e.product_id === t.id;
});
e && e.preloadAllImages(), _.each(this.galleries, function(e) {
if (this.modifiers.length) {
var i = Harrys.productsManager.findById(e.product_id), s = _.filter(this.modifiers, function(e) {
return t.properties[e] === i.properties[e];
}).length;
s > this.modifiers.length - 2 && e.preloadActiveImage();
} else e.preloadActiveImage();
}.bind(this));
}
}), ModifiersSection = new Class({
Implements:Events,
$validations:[],
initialize:function(t) {
this.root_el = t, this.switch_el = this.root_el.getElement(".switch"), this.id_input = this.root_el.getElement("input.id"), 
this.product_ids = _.map(this.root_el.get("data-product-ids").split(","), function(t) {
return t.toInt();
}), this.available_products = Harrys.productsManager.findProductsWithIds(this.product_ids), 
this.switch_el && this.switch_el.addEvent("click", function() {
this.fireEvent("open");
}.bind(this));
var e = this.root_el.getElement(".quantity"), i = this.root_el.getElement(".pack-picker"), s = (this.root_el.getElement(".interval-input"), 
this.root_el.getElement(".color-picker")), n = this.root_el.getElement(".engraving"), o = (this.root_el.getElement(".secondary_engraving"), 
this.root_el.getElement(".recipient-email")), a = this.root_el.getElement(".engraving-selector"), r = this.root_el.getElement(".soft-product-selector"), l = this.root_el.getElement(".tube-size-selector");
if (this.modifiers = {}, e && (this.modifiers.quantity_input = new QuantityInput(e.getElement("input")), 
this.modifiers.quantity_input.addEvents({
change:function() {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(t) {
t(this.modifiers.quantity_input.getValue().toInt() <= 0);
}.bind(this))), i && (this.modifiers.pack_selector = new Toggle(i), this.modifiers.pack_selector.addEvents({
change:function() {
var t = {
checkStock:!0,
changeURL:!0
};
this.updateId(), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
})), s && (this.modifiers.color_selector = new Toggle(s), this.modifiers.color_selector.addEvents({
change:function() {
var t = {
changeHeroImage:!0,
checkStock:!0,
changeURL:!0,
color:!0
};
this.updateId(), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
})), n && (this.modifiers.engraving_input = new EngravingInput(n.getElement("input")), 
this.modifiers.engraving_input.addEvents({
change:function() {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(t) {
this.modifiers.engraving_input.validate(t);
}.bind(this))), o && (this.modifiers.recipient_email_input = new EmailInput(o.getElement("input")), 
this.modifiers.recipient_email_input.addEvents({
change:function() {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(t) {
this.modifiers.recipient_email_input.validate(t);
}.bind(this))), a) {
this.modifiers.engraving_selector = new Checkbox(a);
var c = a.getElements(".input"), h = a.getElements('input[type="text"]'), d = "dual-engraving" === a.get("data-modifier");
_.each(h, function(t) {
var e = t.get("id"), i = a.getElements("label[for=" + e + "]");
t.addEvents({
focus:function() {
_.each(i, function(t) {
t.addClass("focus");
});
},
blur:function() {
_.each(i, function(t) {
t.removeClass("focus");
});
}
});
});
var u = _.map(h, function(t) {
var e = t.get("data-lowercase"), i = {
lowercase:!!e
}, s = new EngravingInput(t, i);
return this.addValidation(function(t) {
this.modifiers.engraving_selector.isChecked() ? s.validate(t) :t();
}.bind(this)), s.addEvent("change", function() {
this.fireEvent("change", this.getCartItem());
}.bind(this)), s;
}.bind(this));
this.modifiers.engraving_input = u[0], this.modifiers.secondary_engraving_input = d ? u[0] :u[1], 
this.modifiers.engraving_selector.addEvents({
change:function() {
_.each(c, function(t) {
this.modifiers.engraving_selector.isChecked() ? t.show() :t.hide();
}.bind(this)), e && (this.modifiers.quantity_input.setValue(1), this.modifiers.engraving_selector.isChecked() ? e.hide() :e.show()), 
this.updateId();
var t = {
checkStock:!0,
changeHeroImage:!0
};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
});
}
r && (this.modifiers.soft_product_selector = new Toggle(r), this.modifiers.soft_product_selector.addEvents({
change:function(t) {
var e = {
changeHeroImage:!0,
checkStock:!0,
changeURL:!0
};
this.updateId();
var i = r.getElement(".cutoff");
i && ("foaming_shave_gel" === t ? i.show() :i.hide()), this.fireEvent("change", [ this.getCartItem(), e ]);
}.bind(this)
})), l && (this.modifiers.tube_size_selector = new Select(l.getElement("select")), 
this.modifiers.tube_size_selector.addEvents({
change:function() {
var t = {
changeHeroImage:!0,
checkStock:!0,
changeURL:!0
};
this.updateId(), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}));
},
updateId:function() {
var t = (Harrys.productsManager.findById(this.id_input.get("value")), {});
if (this.modifiers.pack_selector && (t.pack_size = this.modifiers.pack_selector.getValue()), 
this.modifiers.color_selector && (t.color = this.modifiers.color_selector.getValue()), 
this.modifiers.tube_size_selector && (t.tube_size = this.modifiers.tube_size_selector.getValue()), 
this.modifiers.soft_product_selector && (t.soft_product_type = this.modifiers.soft_product_selector.getValue()), 
this.modifiers.engraving_selector && (t.is_engravable = this.modifiers.engraving_selector.isChecked()), 
!_.isEmpty(t)) {
var e = _.findWhere(this.available_products, t);
this.id_input.set("value", e.id);
}
},
setIdByURL:function() {
var t = document.URL.toURI().get("file");
if (!t) return this;
var e = Harrys.productsManager.findById(this.id_input.get("value"));
return color = t.split("-").join(" ").capitalize(), e = _.findWhere(this.available_products, {
color:color
}) || e, this.modifiers.color_selector && this.modifiers.color_selector.setValue(e.properties.color), 
pack_size = t.split("-")[0], e = Harrys.productsManager.find({
pack_size:pack_size
}) || e, this.modifiers.pack_selector && this.modifiers.pack_selector.setValue(e.properties.pack_size), 
this.modifiers.engraving_selector && "engraved" == t && this.modifiers.engraving_selector.check(), 
this.updateId(), this.fireEvent("change", [ this.getCartItem(), {
changeHeroImage:!0,
checkStock:!0
} ]), this;
},
getCartItem:function() {
var t = this.modifiers.engraving_selector && this.modifiers.engraving_selector.isChecked(), e = !!this.modifiers.engraving_selector, i = !!this.modifiers.engraving_input, s = !!this.modifiers.secondary_engraving_input, n = (t || !e) && i, o = (t || !e) && s, a = !!this.modifiers.recipient_email_input, r = !!this.modifiers.interval_input, l = {};
return l.id = this.id_input.get("value"), l.quantity = this.modifiers.quantity_input ? this.modifiers.quantity_input.getValue() :1, 
l.customizations = {}, n && (l.customizations.engraving = this.modifiers.engraving_input.getValue()), 
o && (l.customizations.secondary_engraving = this.modifiers.secondary_engraving_input.getValue()), 
a && (l.customizations.recipient_email = this.modifiers.recipient_email_input.getValue()), 
r && (l.customizations.interval = this.modifiers.interval_input.getValue()), new CartItem(l);
},
open:function() {
this.root_el.removeClass("closed");
},
close:function() {
this.root_el.addClass("closed");
},
addValidation:function(t) {
return this.$validations.push(t), this;
},
validate:function(t) {
this.$validations.length > 0 ? async.series(this.$validations, t) :t(null, {
success:!0
});
}
}), ProductForm = new Class({
Implements:[ Events, Options ],
options:{
no_show_mini_cart:!1
},
initialize:function(t, e) {
this.setOptions(e), this.rootEl = t, this.price_el = this.rootEl.getElement(".price"), 
this.price_text_el = this.rootEl.getElement(".price-text"), this.description_el = this.rootEl.getElement(".description"), 
this.color_name_el = this.rootEl.getElement(".color-name"), this.add_to_cart_button = new Button(this.rootEl.getElement("button.add-to-cart")), 
this.sold_out_button = new Button(this.rootEl.getElement("button.sold-out, .button.sold-out")), 
this.sold_out_button.el.hasClass("add-to-waitlist") && this.sold_out_button.addEvent("click", function() {
var t = this.active_mod_section.getCartItem().product.id;
this.fireEvent("waitlist_click", t);
}.bind(this)), this.mod_section_els = this.rootEl.getElements(".modifiers"), this.mod_sections = [], 
_.each(this.mod_section_els, function(t) {
var e = new ModifiersSection(t);
this.mod_sections.push(e), e.addEvents({
open:function() {
this.active_mod_section.close(), e.open(), this.active_mod_section = e;
}.bind(this),
change:function(t, e) {
e = e || {}, this.price_el && this.price_el.set("text", "$" + t.product.price.toFloat().toFixed(2)), 
this.price_text_el && this.price_text_el.set("text", t.product.price_text), this.description_el && this.description_el.set("text", t.product.description), 
t.product.color && this.color_name_el && e.color && this.changeColorName(t.product.color), 
this.fireEvent("change", t), e.checkStock && this.checkStock(t);
}.bind(this)
}), t.hasClass("closed") || (this.active_mod_section = e);
}.bind(this));
var i = {
no_show_mini_cart:this.options.no_show_mini_cart
};
this.add_to_cart_button.addEvent("click", function() {
this.active_mod_section.validate(function(t) {
t || Harrys.cart.addItem(this.active_mod_section.getCartItem(), i);
}.bind(this));
}.bind(this));
},
checkStock:function(t) {
var e = this.rootEl.getElement(".availability .all"), i = this.rootEl.getElement(".availability .us-only"), s = this.rootEl.getElement(".availability .ca-only"), n = document.getElement(".avail-flash.us"), o = document.getElement(".avail-flash.ca"), a = t.product.in_stock;
a.US && a.CA ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), e && e.show(), i && i.hide(), s && s.hide(), 
n && n.hide(), o && o.hide()) :a.US ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), e && e.hide(), i && i.show(), s && s.hide(), 
n && n.show(), o && o.hide()) :a.CA ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), e && e.hide(), i && i.hide(), s && s.show(), 
n && n.hide(), o && o.show()) :(this.sold_out_button.el.show(), this.add_to_cart_button.el.hide(), 
this.mod_section_els.addClass("disabled"), e && e.hide(), i && i.hide(), s && s.hide(), 
n && n.hide(), o && o.hide());
},
changeColorName:function(t) {
var e = new Fx.Tween(this.color_name_el, {
duration:300,
property:"opacity"
}).start(1, 0);
e.addEvent("complete", function() {
this.color_name_el.set("text", t), this.color_name_el.fade("in");
}.bind(this));
},
changeURL:function(t) {
t.color && (url = t.color.toLowerCase().replace(" ", "-")), t.pack_size && (url = t.pack_size + "-pack"), 
Modernizr.history && history.pushState(null, null, url);
}
}), Upsell = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.productsIds = _.map(t.get("data-product-ids").split(","), function(t) {
return t.toInt();
}), this.upsellModalEl = this.rootEl.getElement(".upsells.modal"), this.upsellModal, 
this.upsellModalEl && (this.upsellModal = new Modal(this.upsellModalEl));
var e = this.upsellModalEl.getElement(".hero");
e && (this.heroSection = new HeroSection(e));
var i = this.upsellModalEl.getElement(".product.form");
i && (this.productForm = new ProductForm(i, {
no_show_mini_cart:!0
}), this.productForm.addEvents({
change:function(t) {
this.heroSection && this.heroSection.changeHeroByCartItem(t);
}.bind(this)
})), this.upsellButtonEl = this.rootEl.getElement(".upsell_button"), this.upsellButtonEl && this.upsellButtonEl.addEvent("click", function() {
this.upsellModal && (this.upsellModal.open(), this.productForm && this.productForm.active_mod_section.setIdByURL());
}.bind(this)), Harrys.cart.addEvents({
item_added:function(t) {
_.contains(this.productsIds, t.product.id) && (this.upsellModal && this.upsellModal.close(), 
this.upsellButtonEl && (this.upsellButtonEl.addClass("hidden"), this.upsellButtonEl.hide()));
}.bind(this)
});
}
});

Harrys = Harrys || {}, window.addEvent("domready", function() {
function t() {
Harrys.cartFooter.updateSubtotal(), $$(".upsell_button").length === $$(".upsell_button.hidden").length && $$(".upsell-msg").hide();
}
Harrys.analytics.trackCheckoutSection("Cart");
var e = $("cart_table");
e && (Harrys.cartTable = new Table(e));
var i = $("footer");
i && (Harrys.cartFooter = new Footer(i)), _.each($$(".upsell_section > .upsell"), function(t) {
new Upsell(t);
}), Harrys.cartTable.addEvents({
change:t
}), Harrys.cart.addEvents({
item_added:function(e) {
var i = $("cart_table").getElement("tbody"), s = _.template('<tr class="product" data-id="<%= product.id %>" data-price-per="<%= product.price %>" data-key="<%= key %>"><td class="name"><img src="<%= product.checkout_image %>"></td><td class="description"><%= product.name %><% if (product.color && product.color !== "Chrome") { %><span class="color <%= product.color_slug %>"><%= product.color %></span><% } %><% if (product.is_engravable) { %><span class="color engraving"><%= customizations.engraving %></span><% } %><% if (product.is_secondary_engravable && product.properties.is_secondary_engravable != "same_value_as_engraving") { %><span class="color engraving"><%= customizations.secondary_engraving %></span><% } %><% if (product.is_digital) { %><span class="color engraving"><%= customizations.recipient_email %></span><% } %><% if (customizations.interval) { %><span class="color engraving"><% if (customizations.interval > 0) { %>Every <%= customizations.interval %> Month<%= ((customizations.interval==1) ? "" : "s") %><% } else { %>To be added to your shave plan<% } %></span><% } %></td><td class="price-per money">$<%= product.price.toInt().toFixed(2) %></td><td class="quantity"><% if (!product.is_digital) { %> <span class="decrease"><span class="h"></span></span> <input value="<%= quantity %>" data-id="<%= product.id %>" type="text" min="0"> <span class="increase"><span class="v"></span><span class="h"></span></span><% } else { %><input value="<%= quantity %>" data-id="<%= product.id %>" type="hiddden" min="0"><% } %></td><td class="price money"><span class="amount">$<%= (product.price.toInt() * quantity.toInt()).toFixed(2) %></span><span class="remove" data-id="<%= product.id %>"></span></td></tr>'), n = Elements.from(s(e))[0];
Harrys.cartTable.append(n), i.adopt(n), t();
},
item_changed:t,
item_removed:t
});
});