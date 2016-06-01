var WaitlistModal = new Class({
Implements:Events,
$validations:[],
initialize:function(e) {
this.rootEl = e, this.id = null, this.build(), this.setup(), window.addEvent("keyup", function(e) {
e && 27 == e.code && this.hide();
}.bind(this)), this.addValidation(function(e) {
this.email_input ? this.email_input.validate(e) :e();
}.bind(this));
},
build:function() {
var e = Harrys.user.signedIn();
this.closeEl = new Element("span.close");
var t = new Element("div.middle"), i = new Element("h1.title").set("text", "More is on the way!"), n = "We're so sorry that we're currently out of stock. We're working as hard as we can to get more razors. We expect them in the next 2-3 weeks, and hopefully faster! Please" + (e ? " click the button " :" enter your email ") + "below and we'll email you as soon as we are back in stock. Thank you so much for your patience.", s = new Element("p.content").set("text", n), o = new Element("div");
this.button = new Button(new Element("button.blue.medium").set("text", "Notify Me").setStyle("margin-top", "15px"));
var r, a;
e ? o.setStyles({
margin:"0 auto",
width:"630px",
position:"relative",
"text-align":"right"
}) :(o.addClass("email-field"), r = new Element("label").set("text", "Enter Email"), 
a = new Element("input"), a.set("type", Browser.ie ? "text" :"email"), this.email_input = new EmailInput(a, {
flashMessage:!1,
appendErrors:!0
}), o.adopt([ r, a ])), o.adopt(this.button.el), t.adopt(i, s, o), this.rootEl.adopt([ this.closeEl, t ]);
},
setup:function() {
this.closeEl.addEvent("click", this.hide.bind(this)), this.button.addEvent("click", this.addToWaitlist.bind(this));
},
addToWaitlist:function() {
this.validate(function(e) {
e || this.send({
email:this.getEmail(),
viewable_product_id:this.id
});
}.bind(this));
},
send:function(e) {
this.button.disable(), new SignedRequest.JSON({
url:"/api/WaitlistService/addToWaitlistForProduct",
method:"post",
data:e,
onSuccess:function(e) {
e.success ? (this.hide(), new Flash(I18n.t("WaitlistModal.send.success"), "notice")) :new Flash(I18n.t("WaitlistModal.send.error"), "errors"), 
this.button.enable();
}.bind(this),
onFailure:function(e) {
this.button.enable();
new Flash(I18n.t("WaitlistModal.send.fail"), "errors");
}
}).send();
},
getEmail:function() {
return this.email_input ? this.email_input.getValue() :Harrys.user.getEmail();
},
setId:function(e) {
return this.id = e, this;
},
addValidation:function(e) {
return this.$validations.push(e), this;
},
validate:function(e) {
this.$validations.length > 0 ? async.series(this.$validations, e) :e(null, {
success:!0
});
},
show:function() {
return this.rootEl.fade("in"), this;
},
hide:function() {
return this.rootEl.fade("out"), this;
}
}), ImageGallery = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.image_els = this.root_el.getElements(".large-image"), 
this.thumbnail_els = this.root_el.getElements(".thumbnail"), this.product_id = this.root_el.parentElement.get("data-hero-id").toInt(), 
_.each(this.image_els, this.setupImage.bind(this)), _.each(this.thumbnail_els, this.setupThumbnail.bind(this)), 
this.changeActiveImageById("0");
},
setupImage:function(e, t) {
var i = this.image_els[t + 1], n = i ? i.get("data-id") :"0";
e.addEvent("click", function() {
this.changeActiveImageById(n);
}.bind(this));
},
setupThumbnail:function(e) {
var t = e.get("data-id");
e.addEvent("click", function() {
this.changeActiveImageById(t);
}.bind(this));
},
changeActiveImageById:function(e, t) {
var t = t || {}, i = this.getActiveImage(), n = this.getActiveThumbnail(), s = this.getImageById(e), o = this.getThumbnailById(e);
s && (i && i.removeClass("active"), s.addClass("active")), o && (n && n.removeClass("active"), 
o.addClass("active")), t.no_event || this.fireEvent("change", {
id:e,
product_id:this.product_id
});
},
getImageById:function(e) {
return _.find(this.image_els, function(t) {
return t.get("data-id") === e;
});
},
getActiveImage:function() {
return _.find(this.image_els, function(e) {
return e.hasClass("active");
});
},
getThumbnailById:function(e) {
return _.find(this.thumbnail_els, function(t) {
return t.get("data-id") === e;
});
},
getActiveThumbnail:function() {
return _.find(this.thumbnail_els, function(e) {
return e.hasClass("active");
});
},
preloadActiveImage:function() {
var e = this.getActiveImage().getElement("img");
Harrys.Retina.isRetina() ? e.set("src", e.get("data-src2x")) :e.set("src", e.get("data-src"));
},
preloadAllImages:function() {
_.each(this.image_els, function(e) {
var t = e.getElement("img");
Harrys.Retina.isRetina() ? t.set("src", t.get("data-src2x")) :t.set("src", t.get("data-src"));
});
}
}), HeroSection = new Class({
Implements:[ Events, Options ],
initialize:function(e) {
this.root_el = e, this.hero_image_els = this.root_el.getElements(".product-hero"), 
this.galleries = [], this.slideshows = [], this.modifiers = this.root_el.get("data-modifiers") ? this.root_el.get("data-modifiers").split(";") :[], 
_.each(this.hero_image_els, function(e) {
switch (e.get("data-hero-type")) {
case "image":
break;

case "360":
break;

case "slideshow":
this.initSlideshow(e.getElement("ul"));
break;

case "upsell":
break;

case "gallery":
this.initGallery(e.getElement("ul"));
}
}.bind(this));
},
changeHeroByCartItem:function(e) {
var t = this.getCurrentHeroEl(), i = this.getHeroElById(e.product.id);
t.set("data-current-hero", !1).removeClass("active"), i.set("data-current-hero", !0).addClass("active"), 
this.preloadGalleryImages(e.product);
},
initSlideshow:function(e) {
var t = e.getParent().getElement(".arrow.left"), i = e.getParent().getElement(".arrow.right"), n = new SlideShow(e, {
transition:"crossFade",
duration:400,
autoplay:!1
});
t.addEvent("click", function() {
_.each(this.slideshows, function(e) {
e.show("previous");
});
}.bind(this)), i.addEvent("click", function() {
_.each(this.slideshows, function(e) {
e.show("next");
});
}.bind(this)), this.slideshows.push(n);
},
initGallery:function(e) {
var t = new ImageGallery(e);
t.addEvents({
change:function(e) {
_.each(this.galleries, function(t) {
t.changeActiveImageById(e.id, {
no_event:!0
});
}), this.preloadGalleryImages(Harrys.productsManager.findById(e.product_id));
}.bind(this)
}), this.galleries.push(t);
},
getHeroType:function(e) {
return Harrys.IS_MOBILE || !this.hero_image_els.filter('[data-hero-type="' + e + '"]').length ? this.hero_image_els.get("data-hero-type")[0] :e;
},
getCurrentHeroEl:function() {
return _.find(this.hero_image_els, function(e) {
return "true" === e.get("data-current-hero");
});
},
getHeroElByType:function(e) {
return _.find(this.hero_image_els, function(t) {
return t.get("data-hero-type") === e;
});
},
getHeroElById:function(e) {
return _.find(this.hero_image_els, function(t) {
return t.get("data-hero-id").toInt() === e.toInt();
});
},
preloadGalleryImages:function(e) {
var t = _.find(this.galleries, function(t) {
return t.product_id === e.id;
});
t && t.preloadAllImages(), _.each(this.galleries, function(t) {
if (this.modifiers.length) {
var i = Harrys.productsManager.findById(t.product_id), n = _.filter(this.modifiers, function(t) {
return e.properties[t] === i.properties[t];
}).length;
n > this.modifiers.length - 2 && t.preloadActiveImage();
} else t.preloadActiveImage();
}.bind(this));
}
}), ModifiersSection = new Class({
Implements:Events,
$validations:[],
initialize:function(e) {
this.root_el = e, this.switch_el = this.root_el.getElement(".switch"), this.id_input = this.root_el.getElement("input.id"), 
this.product_ids = _.map(this.root_el.get("data-product-ids").split(","), function(e) {
return e.toInt();
}), this.available_products = Harrys.productsManager.findProductsWithIds(this.product_ids), 
this.switch_el && this.switch_el.addEvent("click", function() {
this.fireEvent("open");
}.bind(this));
var t = this.root_el.getElement(".quantity"), i = this.root_el.getElement(".pack-picker"), n = (this.root_el.getElement(".interval-input"), 
this.root_el.getElement(".color-picker")), s = this.root_el.getElement(".engraving"), o = (this.root_el.getElement(".secondary_engraving"), 
this.root_el.getElement(".recipient-email")), r = this.root_el.getElement(".engraving-selector"), a = this.root_el.getElement(".soft-product-selector"), l = this.root_el.getElement(".tube-size-selector");
if (this.modifiers = {}, t && (this.modifiers.quantity_input = new QuantityInput(t.getElement("input")), 
this.modifiers.quantity_input.addEvents({
change:function(e) {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(e) {
e(this.modifiers.quantity_input.getValue().toInt() <= 0);
}.bind(this))), i && (this.modifiers.pack_selector = new Toggle(i), this.modifiers.pack_selector.addEvents({
change:function(e) {
var t = {
checkStock:!0,
changeURL:!0
};
this.updateId(), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
})), n && (this.modifiers.color_selector = new Toggle(n), this.modifiers.color_selector.addEvents({
change:function(e) {
var t = {
changeHeroImage:!0,
checkStock:!0,
changeURL:!0,
color:!0
};
this.updateId(), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
})), s && (this.modifiers.engraving_input = new EngravingInput(s.getElement("input")), 
this.modifiers.engraving_input.addEvents({
change:function(e) {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(e) {
this.modifiers.engraving_input.validate(e);
}.bind(this))), o && (this.modifiers.recipient_email_input = new EmailInput(o.getElement("input")), 
this.modifiers.recipient_email_input.addEvents({
change:function(e) {
var t = {};
this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
}), this.addValidation(function(e) {
this.modifiers.recipient_email_input.validate(e);
}.bind(this))), r) {
this.modifiers.engraving_selector = new Checkbox(r);
var c = r.getElements(".input"), d = r.getElements('input[type="text"]'), h = "dual-engraving" === r.get("data-modifier");
_.each(d, function(e) {
var t = e.get("id"), i = r.getElements("label[for=" + t + "]");
e.addEvents({
focus:function() {
_.each(i, function(e) {
e.addClass("focus");
});
},
blur:function() {
_.each(i, function(e) {
e.removeClass("focus");
});
}
});
});
var u = _.map(d, function(e) {
var t = e.get("data-lowercase"), i = {
lowercase:!!t
}, n = new EngravingInput(e, i);
return this.addValidation(function(e) {
this.modifiers.engraving_selector.isChecked() ? n.validate(e) :e();
}.bind(this)), n.addEvent("change", function(e) {
this.fireEvent("change", this.getCartItem());
}.bind(this)), n;
}.bind(this));
this.modifiers.engraving_input = u[0], this.modifiers.secondary_engraving_input = h ? u[0] :u[1], 
this.modifiers.engraving_selector.addEvents({
change:function(e) {
_.each(c, function(e) {
this.modifiers.engraving_selector.isChecked() ? e.show() :e.hide();
}.bind(this)), t && (this.modifiers.quantity_input.setValue(1), this.modifiers.engraving_selector.isChecked() ? t.hide() :t.show()), 
this.updateId();
var i = {
checkStock:!0,
changeHeroImage:!0
};
this.fireEvent("change", [ this.getCartItem(), i ]);
}.bind(this)
});
}
a && (this.modifiers.soft_product_selector = new Toggle(a), this.modifiers.soft_product_selector.addEvents({
change:function(e) {
var t = {
changeHeroImage:!0,
checkStock:!0,
changeURL:!0
};
this.updateId();
var i = a.getElement(".cutoff");
i && ("foaming_shave_gel" === e ? i.show() :i.hide()), this.fireEvent("change", [ this.getCartItem(), t ]);
}.bind(this)
})), l && (this.modifiers.tube_size_selector = new Select(l.getElement("select")), 
this.modifiers.tube_size_selector.addEvents({
change:function(e) {
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
var e = (Harrys.productsManager.findById(this.id_input.get("value")), {});
if (this.modifiers.pack_selector && (e.pack_size = this.modifiers.pack_selector.getValue()), 
this.modifiers.color_selector && (e.color = this.modifiers.color_selector.getValue()), 
this.modifiers.tube_size_selector && (e.tube_size = this.modifiers.tube_size_selector.getValue()), 
this.modifiers.soft_product_selector && (e.soft_product_type = this.modifiers.soft_product_selector.getValue()), 
this.modifiers.engraving_selector && (e.is_engravable = this.modifiers.engraving_selector.isChecked()), 
!_.isEmpty(e)) {
var t = _.findWhere(this.available_products, e);
this.id_input.set("value", t.id);
}
},
setIdByURL:function() {
var e = document.URL.toURI().get("file"), t = document.URL.toURI().get("directory");
if (!e || "/products/" === t) return this;
var i = Harrys.productsManager.findById(this.id_input.get("value"));
return color = e.split("-").join(" ").capitalize(), i = _.findWhere(this.available_products, {
color:color
}) || i, this.modifiers.color_selector && this.modifiers.color_selector.setValue(i.properties.color), 
pack_size = e.split("-")[0], i = Harrys.productsManager.find({
pack_size:pack_size
}) || i, this.modifiers.pack_selector && this.modifiers.pack_selector.setValue(i.properties.pack_size), 
this.modifiers.engraving_selector && "engraved" == e && this.modifiers.engraving_selector.check(), 
this.updateId(), this.fireEvent("change", [ this.getCartItem(), {
changeHeroImage:!0,
checkStock:!0
} ]), this;
},
getCartItem:function() {
var e = this.modifiers.engraving_selector && this.modifiers.engraving_selector.isChecked(), t = !!this.modifiers.engraving_selector, i = !!this.modifiers.engraving_input, n = !!this.modifiers.secondary_engraving_input, s = (e || !t) && i, o = (e || !t) && n, r = !!this.modifiers.recipient_email_input, a = !!this.modifiers.interval_input, l = {};
return l.id = this.id_input.get("value"), l.quantity = this.modifiers.quantity_input ? this.modifiers.quantity_input.getValue() :1, 
l.customizations = {}, s && (l.customizations.engraving = this.modifiers.engraving_input.getValue()), 
o && (l.customizations.secondary_engraving = this.modifiers.secondary_engraving_input.getValue()), 
r && (l.customizations.recipient_email = this.modifiers.recipient_email_input.getValue()), 
a && (l.customizations.interval = this.modifiers.interval_input.getValue()), new CartItem(l);
},
open:function() {
this.root_el.removeClass("closed");
},
close:function() {
this.root_el.addClass("closed");
},
addValidation:function(e) {
return this.$validations.push(e), this;
},
validate:function(e) {
this.$validations.length > 0 ? async.series(this.$validations, e) :e(null, {
success:!0
});
}
}), ProductForm = new Class({
Implements:[ Events, Options ],
options:{
no_show_mini_cart:!1
},
initialize:function(e, t) {
this.setOptions(t), this.rootEl = e, this.price_el = this.rootEl.getElement(".price"), 
this.price_text_el = this.rootEl.getElement(".price-text"), this.description_el = this.rootEl.getElement(".description"), 
this.color_name_el = this.rootEl.getElement(".color-name"), this.add_to_cart_button = new Button(this.rootEl.getElement("button.add-to-cart")), 
this.sold_out_button = new Button(this.rootEl.getElement("button.sold-out, .button.sold-out")), 
this.sold_out_button.el.hasClass("add-to-waitlist") && this.sold_out_button.addEvent("click", function() {
var e = this.active_mod_section.getCartItem().product.id;
this.fireEvent("waitlist_click", e);
}.bind(this)), this.mod_section_els = this.rootEl.getElements(".modifiers"), this.mod_sections = [], 
_.each(this.mod_section_els, function(e) {
var t = new ModifiersSection(e);
this.mod_sections.push(t), t.addEvents({
open:function() {
this.active_mod_section.close(), t.open(), this.active_mod_section = t;
}.bind(this),
change:function(e, t) {
t = t || {}, this.price_el && this.price_el.set("text", "$" + e.product.price.toFloat().toFixed(2)), 
this.price_text_el && this.price_text_el.set("text", e.product.price_text), this.description_el && this.description_el.set("text", e.product.description), 
e.product.color && this.color_name_el && t.color && this.changeColorName(e.product.color), 
this.fireEvent("change", e), t.checkStock && this.checkStock(e);
}.bind(this)
}), e.hasClass("closed") || (this.active_mod_section = t);
}.bind(this));
var i = {
no_show_mini_cart:this.options.no_show_mini_cart
};
this.add_to_cart_button.addEvent("click", function() {
this.active_mod_section.validate(function(e, t) {
e || Harrys.cart.addItem(this.active_mod_section.getCartItem(), i);
}.bind(this));
}.bind(this));
},
checkStock:function(e) {
var t = this.rootEl.getElement(".availability .all"), i = this.rootEl.getElement(".availability .us-only"), n = this.rootEl.getElement(".availability .ca-only"), s = document.getElement(".avail-flash.us"), o = document.getElement(".avail-flash.ca"), r = e.product.in_stock;
r.US && r.CA ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), t && t.show(), i && i.hide(), n && n.hide(), 
s && s.hide(), o && o.hide()) :r.US ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), t && t.hide(), i && i.show(), n && n.hide(), 
s && s.show(), o && o.hide()) :r.CA ? (this.sold_out_button.el.hide(), this.add_to_cart_button.el.show(), 
this.mod_section_els.removeClass("disabled"), t && t.hide(), i && i.hide(), n && n.show(), 
s && s.hide(), o && o.show()) :(this.sold_out_button.el.show(), this.add_to_cart_button.el.hide(), 
this.mod_section_els.addClass("disabled"), t && t.hide(), i && i.hide(), n && n.hide(), 
s && s.hide(), o && o.hide());
},
changeColorName:function(e) {
if (0 === this.color_name_el.getStyle("opacity")) this.color_name_el.set("text", e), 
this.color_name_el.fade("in"); else {
var t = new Fx.Tween(this.color_name_el, {
duration:300,
property:"opacity"
}).start(1, 0);
t.addEvent("complete", function() {
this.color_name_el.set("text", e), this.color_name_el.fade("in");
}.bind(this));
}
},
displayColorName:function() {
this.color_name_el && this.color_name_el.fade("in");
},
changeURL:function(e) {
e.color && (url = e.color.toLowerCase().replace(" ", "-")), e.pack_size && (url = e.pack_size + "-pack"), 
Modernizr.history && history.pushState(null, null, url);
}
}), Slide = new Class({
Implements:Events,
initialize:function(e, t, i) {
this.rootEl = e, this.parentEl = t, this.index = i;
},
insert:function(e) {
this.rootEl.inject(this.parentEl, e);
},
remove:function() {
this.rootEl = this.rootEl.dispose();
}
}), ProgressBar = new Class({
Implements:Events,
initialize:function(e, t) {
var i;
this.count = t, this.position = 1, this.rootEl = e, this.sliderEl = this.rootEl.getElement(".slider"), 
i = 1 / t * 100, this.sliderEl.setStyle("width", i + "%"), this.slideFx = new Fx.Tween(this.sliderEl, {
duration:"1000",
property:"left",
unit:"%"
});
},
move:function(e) {
var t;
"next" == e ? this.position += 1 :"previous" == e && (this.position -= 1), this.position >= this.count + 1 && (this.position = 1), 
0 === this.position && (this.position = this.count), t = (this.position - 1) / this.count * 100, 
this.slideFx.start(t);
}
}), Gallery = new Class({
Implements:Events,
initialize:function(e, t) {
function i(e) {
var t;
t = e.target.hasClass("right") ? "right" :"left", this.changeSlide(t);
}
function n() {
r = setInterval(changeSlide, 5e3, "right");
}
function s() {
clearTimeout(r);
}
var o, r, a;
if (this.rootEl = e, this.frameEl = this.rootEl.getElement(".frame"), this.slidesEl = this.rootEl.getElement(".slides"), 
this.getSlides(), this.slide_width = this.slideEls[0].getStyle("width").toInt(), 
o = this.slideEls.length * this.slide_width, this.slidesEl.setStyle("width", o), 
this.arrowEls = this.rootEl.getElements(".arrow"), this.arrowEls.addEvents({
click:i.bind(this),
remove_clicks:function() {
this.arrowEls.removeEvents("click");
}.bind(this),
add_clicks:function() {
this.arrowEls.addEvent("click", i.bind(this));
}.bind(this)
}), a = this.rootEl.getElement(".progress"), a && (this.progress_bar = new ProgressBar(a, this.slideEls.length)), 
t.autoplay && (n(), galleryEl.addEvent("mouseover", s), galleryEl.addEvent("mouseout", n)), 
1 === $$(".slideshow").length) {
var l = function(e) {
var t = this.rootEl.getCoordinates().top + this.rootEl.getCoordinates().height, i = window.getScrollTop() + window.getHeight();
t > i || ("left" === e.key ? this.changeSlide("left") :"right" === e.key && this.changeSlide("right"));
}.bind(this);
window.addEvents({
keydown:l,
remove_keypressed:function() {
window.removeEvent("keydown", l);
},
add_keypressed:function() {
window.addEvent("keydown", l);
}
});
}
},
completeMissingSlides:function() {
for (;this.slideEls.length < 5 && this.slideEls.length > 0; ) {
var e = [];
this.slideEls.each(function(t) {
e.push(t.clone().inject(t.getParent()));
}, this), this.slideEls = this.slideEls.concat(e);
}
},
getSlides:function() {
function e(e, t, i) {
this.slides[t] = new Slide(e, this.slidesEl, t);
}
this.slideEls = this.rootEl.getElements(".slide"), this.completeMissingSlides(), 
this.slides = [], this.slideEls.each(e, this);
},
changeSlide:function(e) {
this.arrowEls[0].fireEvent("remove_clicks"), window.fireEvent("remove_keypressed"), 
this.arrowEls.fade("out"), "right" == e ? (this.next(), this.progress_bar && this.progress_bar.move("next")) :(this.previous(), 
this.progress_bar && this.progress_bar.move("previous"));
},
next:function() {
function e() {
t.remove();
var e;
e = n >= this.slides.length - 1 ? 0 :n + 1, this.slides[e].insert("bottom"), this.slides[e].rootEl.setStyle("width", this.slide_width), 
this.getSlides(), this.arrowEls[0].fireEvent("add_clicks"), window.fireEvent("add_keypressed"), 
this.arrowEls.fade("in"), s.removeEvents();
}
var t = this.slides[0], i = this.slides[this.slides.length - 1], n = (t.index, i.index), s = new Fx.Tween(t.rootEl, {
duration:1e3,
property:"width",
link:"ignore"
});
s.addEvent("complete", e.bind(this)), s.start(0);
},
previous:function() {
var e = this.slides[this.slides.length - 1], t = e.rootEl.dispose();
t.setStyle("width", 0), t.inject(this.slidesEl, "top"), this.getSlides();
var i = (this.slides[0], new Fx.Tween(t, {
duration:1e3,
property:"width",
link:"chain",
unit:"px"
}));
i.addEvent("complete", function() {
this.arrowEls[0].fireEvent("add_clicks"), window.fireEvent("add_keypressed"), this.arrowEls.fade("in"), 
i.removeEvents();
}.bind(this)), i.start(this.slide_width);
}
}), BgCoverVideo = new Class({
Implements:[ Events, Options ],
options:{
yOffset:0,
video_r:16 / 9,
lock:"center"
},
initialize:function(e, t) {
function i() {
var e, t = n.parent_el.getSize().y, i = n.parent_el.getSize().x, s = i / t;
if (s < n.options.video_r) "center" === n.options.lock ? e = {
top:0,
left:-(t * n.options.video_r - i) / 2,
height:t
} :"left" === n.options.lock ? e = {
top:0,
left:0,
height:t
} :"right" === n.options.lock && (e = {
top:0,
right:0,
height:t
}); else if ("center" === n.options.lock) {
var o = -(i / n.options.video_r - t) / 2;
Math.abs(o) > n.options.yOffset && (o += n.options.yOffset), e = {
top:o,
left:0,
height:i / n.options.video_r
};
} else "top" === n.options.lock ? e = {
top:0,
left:0,
height:i / n.options.video_r
} :"bottom" === n.options.lock && (e = {
bottom:0,
left:0,
height:i / n.options.video_r
});
n.el.setStyles(e);
}
var n = this;
this.setOptions(t), this.el = e, this.parent_el = this.el.getParent(), this.parent_el.setStyle("overflow", "hidden"), 
i(), window.addEvent("resize", i);
}
});

/*!
 * skrollr core
 *
 * Alexander Prinzhorn - https://github.com/Prinzhorn/skrollr
 *
 * Free to use under terms of MIT license
 */
!function(e, t, i) {
"use strict";
function n(i) {
if (s = t.documentElement, o = t.body, D(), ae = this, i = i || {}, ue = i.constants || {}, 
i.easing) for (var n in i.easing) K[n] = i.easing[n];
Ee = i.edgeStrategy || "set", de = {
beforerender:i.beforerender,
render:i.render,
keyframe:i.keyframe
}, he = i.forceHeight !== !1, he && ($e = i.scale || 1), fe = i.mobileDeceleration || I, 
me = i.smoothScrolling !== !1, pe = i.smoothScrollingDuration || C, ve = {
targetTop:ae.getScrollTop()
}, We = (i.mobileCheck || function() {
return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || e.opera);
})(), We ? (ce = t.getElementById(i.skrollrBody || S), ce && re(), X(), Be(s, [ _, w ], [ E ])) :Be(s, [ _, y ], [ E ]), 
ae.refresh(), be(e, "resize orientationchange", function() {
var e = s.clientWidth, t = s.clientHeight;
(t !== qe || e !== Re) && (qe = t, Re = e, Ue = !0);
});
var r = G();
return function a() {
J(), we = r(a);
}(), ae;
}
var s, o, r = {
get:function() {
return ae;
},
init:function(e) {
return ae || new n(e);
},
VERSION:"0.6.29"
}, a = Object.prototype.hasOwnProperty, l = e.Math, c = e.getComputedStyle, d = "touchstart", h = "touchmove", u = "touchcancel", f = "touchend", g = "skrollable", m = g + "-before", p = g + "-between", v = g + "-after", _ = "skrollr", E = "no-" + _, y = _ + "-desktop", w = _ + "-mobile", b = "linear", k = 1e3, I = .004, S = "skrollr-body", C = 200, T = "start", x = "end", A = "center", B = "bottom", H = "___skrollable_id", z = /^(?:input|textarea|button|select)$/i, F = /^\s+|\s+$/g, V = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/, M = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi, $ = /^(@?[a-z\-]+)\[(\w+)\]$/, P = /-([a-z0-9_])/g, O = function(e, t) {
return t.toUpperCase();
}, L = /[\-+]?[\d]*\.?[\d]+/g, R = /\{\?\}/g, q = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g, U = /[a-z\-]+-gradient/g, N = "", W = "", D = function() {
var e = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
if (c) {
var t = c(o, null);
for (var i in t) if (N = i.match(e) || +i == i && t[i].match(e)) break;
if (!N) return void (N = W = "");
N = N[0], "-" === N.slice(0, 1) ? (W = N, N = {
"-webkit-":"webkit",
"-moz-":"Moz",
"-ms-":"ms",
"-o-":"O"
}[N]) :W = "-" + N.toLowerCase() + "-";
}
}, G = function() {
var t = e.requestAnimationFrame || e[N.toLowerCase() + "RequestAnimationFrame"], i = Fe();
return (We || !t) && (t = function(t) {
var n = Fe() - i, s = l.max(0, 1e3 / 60 - n);
return e.setTimeout(function() {
i = Fe(), t();
}, s);
}), t;
}, j = function() {
var t = e.cancelAnimationFrame || e[N.toLowerCase() + "CancelAnimationFrame"];
return (We || !t) && (t = function(t) {
return e.clearTimeout(t);
}), t;
}, K = {
begin:function() {
return 0;
},
end:function() {
return 1;
},
linear:function(e) {
return e;
},
quadratic:function(e) {
return e * e;
},
cubic:function(e) {
return e * e * e;
},
swing:function(e) {
return -l.cos(e * l.PI) / 2 + .5;
},
sqrt:function(e) {
return l.sqrt(e);
},
outCubic:function(e) {
return l.pow(e - 1, 3) + 1;
},
bounce:function(e) {
var t;
if (.5083 >= e) t = 3; else if (.8489 >= e) t = 9; else if (.96208 >= e) t = 27; else {
if (!(.99981 >= e)) return 1;
t = 91;
}
return 1 - l.abs(3 * l.cos(e * t * 1.028) / t);
}
};
n.prototype.refresh = function(e) {
var n, s, o = !1;
for (e === i ? (o = !0, le = [], Ne = 0, e = t.getElementsByTagName("*")) :e.length === i && (e = [ e ]), 
n = 0, s = e.length; s > n; n++) {
var r = e[n], a = r, l = [], c = me, d = Ee, h = !1;
if (o && H in r && delete r[H], r.attributes) {
for (var u = 0, f = r.attributes.length; f > u; u++) {
var m = r.attributes[u];
if ("data-anchor-target" !== m.name) if ("data-smooth-scrolling" !== m.name) if ("data-edge-strategy" !== m.name) if ("data-emit-events" !== m.name) {
var p = m.name.match(V);
if (null !== p) {
var v = {
props:m.value,
element:r,
eventType:m.name.replace(P, O)
};
l.push(v);
var _ = p[1];
_ && (v.constant = _.substr(1));
var E = p[2];
/p$/.test(E) ? (v.isPercentage = !0, v.offset = (0 | E.slice(0, -1)) / 100) :v.offset = 0 | E;
var y = p[3], w = p[4] || y;
y && y !== T && y !== x ? (v.mode = "relative", v.anchors = [ y, w ]) :(v.mode = "absolute", 
y === x ? v.isEnd = !0 :v.isPercentage || (v.offset = v.offset * $e));
}
} else h = !0; else d = m.value; else c = "off" !== m.value; else if (a = t.querySelector(m.value), 
null === a) throw 'Unable to find anchor target "' + m.value + '"';
}
if (l.length) {
var b, k, I;
!o && H in r ? (I = r[H], b = le[I].styleAttr, k = le[I].classAttr) :(I = r[H] = Ne++, 
b = r.style.cssText, k = Ae(r)), le[I] = {
element:r,
styleAttr:b,
classAttr:k,
anchorTarget:a,
keyFrames:l,
smoothScrolling:c,
edgeStrategy:d,
emitEvents:h,
lastFrameIndex:-1
}, Be(r, [ g ], []);
}
}
}
for (Ce(), n = 0, s = e.length; s > n; n++) {
var S = le[e[n][H]];
S !== i && (Z(S), te(S));
}
return ae;
}, n.prototype.relativeToAbsolute = function(e, t, i) {
var n = s.clientHeight, o = e.getBoundingClientRect(), r = o.top, a = o.bottom - o.top;
return t === B ? r -= n :t === A && (r -= n / 2), i === B ? r += a :i === A && (r += a / 2), 
r += ae.getScrollTop(), r + .5 | 0;
}, n.prototype.animateTo = function(e, t) {
t = t || {};
var n = Fe(), s = ae.getScrollTop();
return ge = {
startTop:s,
topDiff:e - s,
targetTop:e,
duration:t.duration || k,
startTime:n,
endTime:n + (t.duration || k),
easing:K[t.easing || b],
done:t.done
}, ge.topDiff || (ge.done && ge.done.call(ae, !1), ge = i), ae;
}, n.prototype.stopAnimateTo = function() {
ge && ge.done && ge.done.call(ae, !0), ge = i;
}, n.prototype.isAnimatingTo = function() {
return !!ge;
}, n.prototype.isMobile = function() {
return We;
}, n.prototype.setScrollTop = function(t, i) {
return _e = i === !0, We ? De = l.min(l.max(t, 0), Me) :e.scrollTo(0, t), ae;
}, n.prototype.getScrollTop = function() {
return We ? De :e.pageYOffset || s.scrollTop || o.scrollTop || 0;
}, n.prototype.getMaxScrollTop = function() {
return Me;
}, n.prototype.on = function(e, t) {
return de[e] = t, ae;
}, n.prototype.off = function(e) {
return delete de[e], ae;
}, n.prototype.destroy = function() {
var e = j();
e(we), Ie(), Be(s, [ E ], [ _, y, w ]);
for (var t = 0, n = le.length; n > t; t++) oe(le[t].element);
s.style.overflow = o.style.overflow = "", s.style.height = o.style.height = "", 
ce && r.setStyle(ce, "transform", "none"), ae = i, ce = i, de = i, he = i, Me = 0, 
$e = 1, ue = i, fe = i, Pe = "down", Oe = -1, Re = 0, qe = 0, Ue = !1, ge = i, me = i, 
pe = i, ve = i, _e = i, Ne = 0, Ee = i, We = !1, De = 0, ye = i;
};
var X = function() {
var n, r, a, c, g, m, p, v, _, E, y, w;
be(s, [ d, h, u, f ].join(" "), function(e) {
var s = e.changedTouches[0];
for (c = e.target; 3 === c.nodeType; ) c = c.parentNode;
switch (g = s.clientY, m = s.clientX, E = e.timeStamp, z.test(c.tagName) || e.preventDefault(), 
e.type) {
case d:
n && n.blur(), ae.stopAnimateTo(), n = c, r = p = g, a = m, _ = E;
break;

case h:
z.test(c.tagName) && t.activeElement !== c && e.preventDefault(), v = g - p, w = E - y, 
ae.setScrollTop(De - v, !0), p = g, y = E;
break;

default:
case u:
case f:
var o = r - g, b = a - m, k = b * b + o * o;
if (49 > k) {
if (!z.test(n.tagName)) {
n.focus();
var I = t.createEvent("MouseEvents");
I.initMouseEvent("click", !0, !0, e.view, 1, s.screenX, s.screenY, s.clientX, s.clientY, e.ctrlKey, e.altKey, e.shiftKey, e.metaKey, 0, null), 
n.dispatchEvent(I);
}
return;
}
n = i;
var S = v / w;
S = l.max(l.min(S, 3), -3);
var C = l.abs(S / fe), T = S * C + .5 * fe * C * C, x = ae.getScrollTop() - T, A = 0;
x > Me ? (A = (Me - x) / T, x = Me) :0 > x && (A = -x / T, x = 0), C *= 1 - A, ae.animateTo(x + .5 | 0, {
easing:"outCubic",
duration:C
});
}
}), e.scrollTo(0, 0), s.style.overflow = o.style.overflow = "hidden";
}, Y = function() {
var e, t, i, n, o, r, a, c, d, h, u, f = s.clientHeight, g = Te();
for (c = 0, d = le.length; d > c; c++) for (e = le[c], t = e.element, i = e.anchorTarget, 
n = e.keyFrames, o = 0, r = n.length; r > o; o++) a = n[o], h = a.offset, u = g[a.constant] || 0, 
a.frame = h, a.isPercentage && (h *= f, a.frame = h), "relative" === a.mode && (oe(t), 
a.frame = ae.relativeToAbsolute(i, a.anchors[0], a.anchors[1]) - h, oe(t, !0)), 
a.frame += u, he && !a.isEnd && a.frame > Me && (Me = a.frame);
for (Me = l.max(Me, xe()), c = 0, d = le.length; d > c; c++) {
for (e = le[c], n = e.keyFrames, o = 0, r = n.length; r > o; o++) a = n[o], u = g[a.constant] || 0, 
a.isEnd && (a.frame = Me - a.offset + u);
e.keyFrames.sort(Ve);
}
}, Q = function(e, t) {
for (var i = 0, n = le.length; n > i; i++) {
var s, o, l = le[i], c = l.element, d = l.smoothScrolling ? e :t, h = l.keyFrames, u = h.length, f = h[0], _ = h[h.length - 1], E = d < f.frame, y = d > _.frame, w = E ? f :_, b = l.emitEvents, k = l.lastFrameIndex;
if (E || y) {
if (E && -1 === l.edge || y && 1 === l.edge) continue;
switch (E ? (Be(c, [ m ], [ v, p ]), b && k > -1 && (Se(c, f.eventType, Pe), l.lastFrameIndex = -1)) :(Be(c, [ v ], [ m, p ]), 
b && u > k && (Se(c, _.eventType, Pe), l.lastFrameIndex = u)), l.edge = E ? -1 :1, 
l.edgeStrategy) {
case "reset":
oe(c);
continue;

case "ease":
d = w.frame;
break;

default:
case "set":
var I = w.props;
for (s in I) a.call(I, s) && (o = se(I[s].value), 0 === s.indexOf("@") ? c.setAttribute(s.substr(1), o) :r.setStyle(c, s, o));
continue;
}
} else 0 !== l.edge && (Be(c, [ g, p ], [ m, v ]), l.edge = 0);
for (var S = 0; u - 1 > S; S++) if (d >= h[S].frame && d <= h[S + 1].frame) {
var C = h[S], T = h[S + 1];
for (s in C.props) if (a.call(C.props, s)) {
var x = (d - C.frame) / (T.frame - C.frame);
x = C.props[s].easing(x), o = ne(C.props[s].value, T.props[s].value, x), o = se(o), 
0 === s.indexOf("@") ? c.setAttribute(s.substr(1), o) :r.setStyle(c, s, o);
}
b && k !== S && ("down" === Pe ? Se(c, C.eventType, Pe) :Se(c, T.eventType, Pe), 
l.lastFrameIndex = S);
break;
}
}
}, J = function() {
Ue && (Ue = !1, Ce());
var e, t, n = ae.getScrollTop(), s = Fe();
if (ge) s >= ge.endTime ? (n = ge.targetTop, e = ge.done, ge = i) :(t = ge.easing((s - ge.startTime) / ge.duration), 
n = ge.startTop + t * ge.topDiff | 0), ae.setScrollTop(n, !0); else if (!_e) {
var o = ve.targetTop - n;
o && (ve = {
startTop:Oe,
topDiff:n - Oe,
targetTop:n,
startTime:Le,
endTime:Le + pe
}), s <= ve.endTime && (t = K.sqrt((s - ve.startTime) / pe), n = ve.startTop + t * ve.topDiff | 0);
}
if (We && ce && r.setStyle(ce, "transform", "translate(0, " + -De + "px) " + ye), 
_e || Oe !== n) {
Pe = n > Oe ? "down" :Oe > n ? "up" :Pe, _e = !1;
var a = {
curTop:n,
lastTop:Oe,
maxTop:Me,
direction:Pe
}, l = de.beforerender && de.beforerender.call(ae, a);
l !== !1 && (Q(n, ae.getScrollTop()), Oe = n, de.render && de.render.call(ae, a)), 
e && e.call(ae, !1);
}
Le = s;
}, Z = function(e) {
for (var t = 0, i = e.keyFrames.length; i > t; t++) {
for (var n, s, o, r, a = e.keyFrames[t], l = {}; null !== (r = M.exec(a.props)); ) o = r[1], 
s = r[2], n = o.match($), null !== n ? (o = n[1], n = n[2]) :n = b, s = s.indexOf("!") ? ee(s) :[ s.slice(1) ], 
l[o] = {
value:s,
easing:K[n]
};
a.props = l;
}
}, ee = function(e) {
var t = [];
return q.lastIndex = 0, e = e.replace(q, function(e) {
return e.replace(L, function(e) {
return e / 255 * 100 + "%";
});
}), W && (U.lastIndex = 0, e = e.replace(U, function(e) {
return W + e;
})), e = e.replace(L, function(e) {
return t.push(+e), "{?}";
}), t.unshift(e), t;
}, te = function(e) {
var t, i, n = {};
for (t = 0, i = e.keyFrames.length; i > t; t++) ie(e.keyFrames[t], n);
for (n = {}, t = e.keyFrames.length - 1; t >= 0; t--) ie(e.keyFrames[t], n);
}, ie = function(e, t) {
var i;
for (i in t) a.call(e.props, i) || (e.props[i] = t[i]);
for (i in e.props) t[i] = e.props[i];
}, ne = function(e, t, i) {
var n, s = e.length;
if (s !== t.length) throw "Can't interpolate between \"" + e[0] + '" and "' + t[0] + '"';
var o = [ e[0] ];
for (n = 1; s > n; n++) o[n] = e[n] + (t[n] - e[n]) * i;
return o;
}, se = function(e) {
var t = 1;
return R.lastIndex = 0, e[0].replace(R, function() {
return e[t++];
});
}, oe = function(e, t) {
e = [].concat(e);
for (var i, n, s = 0, o = e.length; o > s; s++) n = e[s], i = le[n[H]], i && (t ? (n.style.cssText = i.dirtyStyleAttr, 
Be(n, i.dirtyClassAttr)) :(i.dirtyStyleAttr = n.style.cssText, i.dirtyClassAttr = Ae(n), 
n.style.cssText = i.styleAttr, Be(n, i.classAttr)));
}, re = function() {
ye = "translateZ(0)", r.setStyle(ce, "transform", ye);
var e = c(ce), t = e.getPropertyValue("transform"), i = e.getPropertyValue(W + "transform"), n = t && "none" !== t || i && "none" !== i;
n || (ye = "");
};
r.setStyle = function(e, t, i) {
var n = e.style;
if (t = t.replace(P, O).replace("-", ""), "zIndex" === t) isNaN(i) ? n[t] = i :n[t] = "" + (0 | i); else if ("float" === t) n.styleFloat = n.cssFloat = i; else try {
N && (n[N + t.slice(0, 1).toUpperCase() + t.slice(1)] = i), n[t] = i;
} catch (s) {}
};
var ae, le, ce, de, he, ue, fe, ge, me, pe, ve, _e, Ee, ye, we, be = r.addEvent = function(t, i, n) {
var s = function(t) {
return t = t || e.event, t.target || (t.target = t.srcElement), t.preventDefault || (t.preventDefault = function() {
t.returnValue = !1, t.defaultPrevented = !0;
}), n.call(this, t);
};
i = i.split(" ");
for (var o, r = 0, a = i.length; a > r; r++) o = i[r], t.addEventListener ? t.addEventListener(o, n, !1) :t.attachEvent("on" + o, s), 
Ge.push({
element:t,
name:o,
listener:n
});
}, ke = r.removeEvent = function(e, t, i) {
t = t.split(" ");
for (var n = 0, s = t.length; s > n; n++) e.removeEventListener ? e.removeEventListener(t[n], i, !1) :e.detachEvent("on" + t[n], i);
}, Ie = function() {
for (var e, t = 0, i = Ge.length; i > t; t++) e = Ge[t], ke(e.element, e.name, e.listener);
Ge = [];
}, Se = function(e, t, i) {
de.keyframe && de.keyframe.call(ae, e, t, i);
}, Ce = function() {
var e = ae.getScrollTop();
Me = 0, he && !We && (o.style.height = ""), Y(), he && !We && (o.style.height = Me + s.clientHeight + "px"), 
We ? ae.setScrollTop(l.min(ae.getScrollTop(), Me)) :ae.setScrollTop(e, !0), _e = !0;
}, Te = function() {
var e, t, i = s.clientHeight, n = {};
for (e in ue) t = ue[e], "function" == typeof t ? t = t.call(ae) :/p$/.test(t) && (t = t.slice(0, -1) / 100 * i), 
n[e] = t;
return n;
}, xe = function() {
var e, t = 0;
return ce && (t = l.max(ce.offsetHeight, ce.scrollHeight)), e = l.max(t, o.scrollHeight, o.offsetHeight, s.scrollHeight, s.offsetHeight, s.clientHeight), 
e - s.clientHeight;
}, Ae = function(t) {
var i = "className";
return e.SVGElement && t instanceof e.SVGElement && (t = t[i], i = "baseVal"), t[i];
}, Be = function(t, n, s) {
var o = "className";
if (e.SVGElement && t instanceof e.SVGElement && (t = t[o], o = "baseVal"), s === i) return void (t[o] = n);
for (var r = t[o], a = 0, l = s.length; l > a; a++) r = ze(r).replace(ze(s[a]), " ");
r = He(r);
for (var c = 0, d = n.length; d > c; c++) -1 === ze(r).indexOf(ze(n[c])) && (r += " " + n[c]);
t[o] = He(r);
}, He = function(e) {
return e.replace(F, "");
}, ze = function(e) {
return " " + e + " ";
}, Fe = Date.now || function() {
return +new Date();
}, Ve = function(e, t) {
return e.frame - t.frame;
}, Me = 0, $e = 1, Pe = "down", Oe = -1, Le = Fe(), Re = 0, qe = 0, Ue = !1, Ne = 0, We = !1, De = 0, Ge = [];
"function" == typeof define && define.amd ? define([], function() {
return r;
}) :"undefined" != typeof module && module.exports ? module.exports = r :e.skrollr = r;
}(window, document);

var AnnotationModule = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(e, t) {
this.setOptions(t), this.root_el = e, this.points = _.map(this.root_el.getElements(".point"), function(e) {
var t = new Point(e);
return t.addEvents({
mouseover:this.activateEverythingById.bind(this),
mouseout:this.deactivateEverythingById.bind(this)
}), t;
}.bind(this)), this.articles = _.map(this.root_el.getElements("article"), function(e) {
var t = new Article(e);
return t.addEvents({
mouseover:this.activateEverythingById.bind(this),
mouseout:this.deactivateEverythingById.bind(this)
}), t;
}.bind(this));
},
activateEverythingById:function(e) {
this.activateArticleById(e), this.activatePointById(e);
},
deactivateEverythingById:function(e) {
this.deactivateArticleById(e), this.deactivatePointById(e);
},
activateArticleById:function(e) {
_.each(this.articles, function(t) {
var i = e === t.id ? "makeActive" :"makeInactive";
t[i]();
});
},
deactivateArticleById:function(e) {
_.each(this.articles, function(e) {
e.removeActiveInactive();
});
},
activatePointById:function(e) {
_.each(this.points, function(t) {
var i = e === t.id ? "makeActive" :"makeInactive";
t[i]();
});
},
deactivatePointById:function(e) {
_.each(this.points, function(e) {
e.removeActiveInactive();
});
}
}), Harrys = Harrys || {};

window.addEvent("domready", function() {
var e, t = document.getElement(".hero"), i = new HeroSection(t), n = $("waitlist_popup");
n && (e = new WaitlistModal(n));
var s, o = $$(".product-description"), r = document.getElement(".product.form");
if (r && (s = new ProductForm(r), s.addEvents({
waitlist_click:function(t) {
e && e.setId(t).show();
},
change:function(e) {
i && i.changeHeroByCartItem(e), _.each(o, function(t) {
t.get("data-id").toInt() === e.product.id ? t.setStyle("display", "block") :t.setStyle("display", "none");
});
}
}), s.active_mod_section.setIdByURL(), s.displayColorName()), _.each($$("body .video"), function(e) {
new Video(e);
}), _.each($$(".slideshow.product-gallery"), function(e, t, i) {
new Gallery(e, {
autoplay:!1
});
}), !Browser.Platform.ios && !Browser.Platform.android && !Harrys.IS_MOBILE) {
skrollr.init({
forceHeight:!1
});
}
var a = new URI().get("query").parseQueryString(), l = a["wraith-no-animate"] ? !1 :!0;
_.each($$("video.cover"), function(e, t, i) {
l || e.removeAttribute("autoplay"), new BgCoverVideo(e, {
yOffset:150
});
});
var c = $("carousel");
if (c) {
Harrys.slideShow = new SlideShow(c, {
transition:"pushLeft",
autoplay:!1,
delay:5e3,
selector:"> li"
});
var d = c.getElement(".arrow.left"), h = c.getElement(".arrow.right");
d.addEvent("click", function() {
Harrys.slideShow.show("previous", {
transition:"pushRight"
});
}), h.addEvent("click", function() {
Harrys.slideShow.show("next", {
transition:"pushLeft"
});
}), Hammer(c, {
drag:!1,
swipeVelocityX:.1
}).on("swipe", function(e) {
if (_.include([ "left", "right" ], e.gesture.direction)) {
var t, i;
"left" == e.gesture.direction ? (t = "pushLeft", i = "next") :"right" == e.gesture.direction && (t = "pushRight", 
i = "previous"), Harrys.slideShow.show(i, {
transition:t
});
}
});
}
var u = {
overview:document.getElement(".page.overview"),
shipping:document.getElement(".page.shipping"),
faq:document.getElement(".page.faq")
}, f = document.getElements(".tabs .tab");
f && _.each(f, function(e) {
e.addEvent("click", function() {
var t = e.get("data-page");
_.each(u, function(e) {
e && e.hide();
}), u[t] && (u[t].show(), new Fx.Scroll(window, {
offset:{
x:0,
y:-50
}
}).toElement(u[t])), _.each(f, function(e) {
e.removeClass("active");
}), e.addClass("active");
});
});
var g = document.getElements(".product.form .extra-info .link");
if (g && _.each(g, function(e) {
e.addEvent("click", function() {
var e;
f && (e = _.find(f, function(e) {
return "shipping" === e.get("data-page");
}), _.each(f, function(e) {
e.removeClass("active");
}), e && e.addClass("active")), u.shipping && (_.each(u, function(e) {
e && e.hide();
}), u.shipping.show(), new Fx.Scroll(window).toElement(u.shipping));
});
}), u.faq) {
var m = u.faq.getElements("article");
_.each(m, function(e) {
var t = e.getElement("h3"), i = e.getElement(".open-close");
t.addEvent("click", function() {
e.toggleClass("open");
}), i.addEvent("click", function() {
e.toggleClass("open");
});
});
}
_.each($$(".module.annotation"), function(e) {
new AnnotationModule(e);
});
});