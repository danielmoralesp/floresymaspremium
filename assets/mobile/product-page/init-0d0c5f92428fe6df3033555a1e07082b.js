var WaitlistModal = new Class({
Implements:Events,
$validations:[],
initialize:function(t) {
this.rootEl = t, this.id = null, this.build(), this.setup(), window.addEvent("keyup", function(t) {
t && 27 == t.code && this.hide();
}.bind(this)), this.addValidation(function(t) {
this.email_input ? this.email_input.validate(t) :t();
}.bind(this));
},
build:function() {
var t = Harrys.user.signedIn();
this.closeEl = new Element("span.close");
var e = new Element("div.middle"), i = new Element("h1.title").set("text", "More is on the way!"), s = "We're so sorry that we're currently out of stock. We're working as hard as we can to get more razors. We expect them in the next 2-3 weeks, and hopefully faster! Please" + (t ? " click the button " :" enter your email ") + "below and we'll email you as soon as we are back in stock. Thank you so much for your patience.", n = new Element("p.content").set("text", s), o = new Element("div");
this.button = new Button(new Element("button.blue.medium").set("text", "Notify Me").setStyle("margin-top", "15px"));
var a, r;
t ? o.setStyles({
margin:"0 auto",
width:"630px",
position:"relative",
"text-align":"right"
}) :(o.addClass("email-field"), a = new Element("label").set("text", "Enter Email"), 
r = new Element("input"), r.set("type", Browser.ie ? "text" :"email"), this.email_input = new EmailInput(r, {
flashMessage:!1,
appendErrors:!0
}), o.adopt([ a, r ])), o.adopt(this.button.el), e.adopt(i, n, o), this.rootEl.adopt([ this.closeEl, e ]);
},
setup:function() {
this.closeEl.addEvent("click", this.hide.bind(this)), this.button.addEvent("click", this.addToWaitlist.bind(this));
},
addToWaitlist:function() {
this.validate(function(t) {
t || this.send({
email:this.getEmail(),
viewable_product_id:this.id
});
}.bind(this));
},
send:function(t) {
this.button.disable(), new SignedRequest.JSON({
url:"/api/WaitlistService/addToWaitlistForProduct",
method:"post",
data:t,
onSuccess:function(t) {
t.success ? (this.hide(), new Flash(I18n.t("WaitlistModal.send.success"), "notice")) :new Flash(I18n.t("WaitlistModal.send.error"), "errors"), 
this.button.enable();
}.bind(this),
onFailure:function() {
this.button.enable();
new Flash(I18n.t("WaitlistModal.send.fail"), "errors");
}
}).send();
},
getEmail:function() {
return this.email_input ? this.email_input.getValue() :Harrys.user.getEmail();
},
setId:function(t) {
return this.id = t, this;
},
addValidation:function(t) {
return this.$validations.push(t), this;
},
validate:function(t) {
this.$validations.length > 0 ? async.series(this.$validations, t) :t(null, {
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
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.image_els = this.root_el.getElements(".large-image"), 
this.thumbnail_els = this.root_el.getElements(".thumbnail"), this.product_id = this.root_el.parentElement.get("data-hero-id").toInt(), 
_.each(this.image_els, this.setupImage.bind(this)), _.each(this.thumbnail_els, this.setupThumbnail.bind(this)), 
this.changeActiveImageById("0");
},
setupImage:function(t, e) {
var i = this.image_els[e + 1], s = i ? i.get("data-id") :"0";
t.addEvent("click", function() {
this.changeActiveImageById(s);
}.bind(this));
},
setupThumbnail:function(t) {
var e = t.get("data-id");
t.addEvent("click", function() {
this.changeActiveImageById(e);
}.bind(this));
},
changeActiveImageById:function(t, e) {
var e = e || {}, i = this.getActiveImage(), s = this.getActiveThumbnail(), n = this.getImageById(t), o = this.getThumbnailById(t);
n && (i && i.removeClass("active"), n.addClass("active")), o && (s && s.removeClass("active"), 
o.addClass("active")), e.no_event || this.fireEvent("change", {
id:t,
product_id:this.product_id
});
},
getImageById:function(t) {
return _.find(this.image_els, function(e) {
return e.get("data-id") === t;
});
},
getActiveImage:function() {
return _.find(this.image_els, function(t) {
return t.hasClass("active");
});
},
getThumbnailById:function(t) {
return _.find(this.thumbnail_els, function(e) {
return e.get("data-id") === t;
});
},
getActiveThumbnail:function() {
return _.find(this.thumbnail_els, function(t) {
return t.hasClass("active");
});
},
preloadActiveImage:function() {
var t = this.getActiveImage().getElement("img");
t.set("src", t.get("data-src"));
},
preloadAllImages:function() {
_.each(this.image_els, function(t) {
var e = t.getElement("img");
e.set("src", e.get("data-src"));
});
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
var t = document.URL.toURI().get("file"), e = document.URL.toURI().get("directory");
if (!t || "/products/" === e) return this;
var i = Harrys.productsManager.findById(this.id_input.get("value"));
return color = t.split("-").join(" ").capitalize(), i = _.findWhere(this.available_products, {
color:color
}) || i, this.modifiers.color_selector && this.modifiers.color_selector.setValue(i.properties.color), 
pack_size = t.split("-")[0], i = Harrys.productsManager.find({
pack_size:pack_size
}) || i, this.modifiers.pack_selector && this.modifiers.pack_selector.setValue(i.properties.pack_size), 
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
if (0 === this.color_name_el.getStyle("opacity")) this.color_name_el.set("text", t), 
this.color_name_el.fade("in"); else {
var e = new Fx.Tween(this.color_name_el, {
duration:300,
property:"opacity"
}).start(1, 0);
e.addEvent("complete", function() {
this.color_name_el.set("text", t), this.color_name_el.fade("in");
}.bind(this));
}
},
displayColorName:function() {
this.color_name_el && this.color_name_el.fade("in");
},
changeURL:function(t) {
t.color && (url = t.color.toLowerCase().replace(" ", "-")), t.pack_size && (url = t.pack_size + "-pack"), 
Modernizr.history && history.pushState(null, null, url);
}
}), Slide = new Class({
Implements:Events,
initialize:function(t, e, i) {
this.rootEl = t, this.parentEl = e, this.index = i;
},
insert:function(t) {
this.rootEl.inject(this.parentEl, t);
},
remove:function() {
this.rootEl = this.rootEl.dispose();
}
}), ProgressBar = new Class({
Implements:Events,
initialize:function(t, e) {
var i;
this.count = e, this.position = 1, this.rootEl = t, this.sliderEl = this.rootEl.getElement(".slider"), 
i = 1 / e * 100, this.sliderEl.setStyle("width", i + "%"), this.slideFx = new Fx.Tween(this.sliderEl, {
duration:"1000",
property:"left",
unit:"%"
});
},
move:function(t) {
var e;
"next" == t ? this.position += 1 :"previous" == t && (this.position -= 1), this.position >= this.count + 1 && (this.position = 1), 
0 === this.position && (this.position = this.count), e = (this.position - 1) / this.count * 100, 
this.slideFx.start(e);
}
}), Gallery = new Class({
Implements:Events,
initialize:function(t, e) {
function i(t) {
var e;
e = t.target.hasClass("right") ? "right" :"left", this.changeSlide(e);
}
function s() {
a = setInterval(changeSlide, 5e3, "right");
}
function n() {
clearTimeout(a);
}
var o, a, r;
if (this.rootEl = t, this.frameEl = this.rootEl.getElement(".frame"), this.slidesEl = this.rootEl.getElement(".slides"), 
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
}), r = this.rootEl.getElement(".progress"), r && (this.progress_bar = new ProgressBar(r, this.slideEls.length)), 
e.autoplay && (s(), galleryEl.addEvent("mouseover", n), galleryEl.addEvent("mouseout", s)), 
1 === $$(".slideshow").length) {
var l = function(t) {
var e = this.rootEl.getCoordinates().top + this.rootEl.getCoordinates().height, i = window.getScrollTop() + window.getHeight();
e > i || ("left" === t.key ? this.changeSlide("left") :"right" === t.key && this.changeSlide("right"));
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
var t = [];
this.slideEls.each(function(e) {
t.push(e.clone().inject(e.getParent()));
}, this), this.slideEls = this.slideEls.concat(t);
}
},
getSlides:function() {
function t(t, e) {
this.slides[e] = new Slide(t, this.slidesEl, e);
}
this.slideEls = this.rootEl.getElements(".slide"), this.completeMissingSlides(), 
this.slides = [], this.slideEls.each(t, this);
},
changeSlide:function(t) {
this.arrowEls[0].fireEvent("remove_clicks"), window.fireEvent("remove_keypressed"), 
this.arrowEls.fade("out"), "right" == t ? (this.next(), this.progress_bar && this.progress_bar.move("next")) :(this.previous(), 
this.progress_bar && this.progress_bar.move("previous"));
},
next:function() {
function t() {
e.remove();
var t;
t = s >= this.slides.length - 1 ? 0 :s + 1, this.slides[t].insert("bottom"), this.slides[t].rootEl.setStyle("width", this.slide_width), 
this.getSlides(), this.arrowEls[0].fireEvent("add_clicks"), window.fireEvent("add_keypressed"), 
this.arrowEls.fade("in"), n.removeEvents();
}
var e = this.slides[0], i = this.slides[this.slides.length - 1], s = (e.index, i.index), n = new Fx.Tween(e.rootEl, {
duration:1e3,
property:"width",
link:"ignore"
});
n.addEvent("complete", t.bind(this)), n.start(0);
},
previous:function() {
var t = this.slides[this.slides.length - 1], e = t.rootEl.dispose();
e.setStyle("width", 0), e.inject(this.slidesEl, "top"), this.getSlides();
var i = (this.slides[0], new Fx.Tween(e, {
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
initialize:function(t, e) {
function i() {
var t, e = s.parent_el.getSize().y, i = s.parent_el.getSize().x, n = i / e;
if (n < s.options.video_r) "center" === s.options.lock ? t = {
top:0,
left:-(e * s.options.video_r - i) / 2,
height:e
} :"left" === s.options.lock ? t = {
top:0,
left:0,
height:e
} :"right" === s.options.lock && (t = {
top:0,
right:0,
height:e
}); else if ("center" === s.options.lock) {
var o = -(i / s.options.video_r - e) / 2;
Math.abs(o) > s.options.yOffset && (o += s.options.yOffset), t = {
top:o,
left:0,
height:i / s.options.video_r
};
} else "top" === s.options.lock ? t = {
top:0,
left:0,
height:i / s.options.video_r
} :"bottom" === s.options.lock && (t = {
bottom:0,
left:0,
height:i / s.options.video_r
});
s.el.setStyles(t);
}
var s = this;
this.setOptions(e), this.el = t, this.parent_el = this.el.getParent(), this.parent_el.setStyle("overflow", "hidden"), 
i(), window.addEvent("resize", i);
}
});

!function(t, e, i) {
"use strict";
function s(i) {
if (n = e.documentElement, o = e.body, N(), re = this, i = i || {}, ue = i.constants || {}, 
i.easing) for (var s in i.easing) j[s] = i.easing[s];
Ee = i.edgeStrategy || "set", he = {
beforerender:i.beforerender,
render:i.render,
keyframe:i.keyframe
}, de = i.forceHeight !== !1, de && (Fe = i.scale || 1), ge = i.mobileDeceleration || I, 
fe = i.smoothScrolling !== !1, pe = i.smoothScrollingDuration || S, _e = {
targetTop:re.getScrollTop()
}, Ge = (i.mobileCheck || function() {
return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || t.opera);
})(), Ge ? (ce = e.getElementById(i.skrollrBody || C), ce && ae(), Y(), He(n, [ v, b ], [ E ])) :He(n, [ v, y ], [ E ]), 
re.refresh(), we(t, "resize orientationchange", function() {
var t = n.clientWidth, e = n.clientHeight;
(e !== Pe || t !== Le) && (Pe = e, Le = t, Oe = !0);
});
var a = D();
return function r() {
J(), be = a(r);
}(), re;
}
var n, o, a = {
get:function() {
return re;
},
init:function(t) {
return re || new s(t);
},
VERSION:"0.6.29"
}, r = Object.prototype.hasOwnProperty, l = t.Math, c = t.getComputedStyle, h = "touchstart", d = "touchmove", u = "touchcancel", g = "touchend", m = "skrollable", f = m + "-before", p = m + "-between", _ = m + "-after", v = "skrollr", E = "no-" + v, y = v + "-desktop", b = v + "-mobile", w = "linear", k = 1e3, I = .004, C = "skrollr-body", S = 200, x = "start", z = "end", T = "center", H = "bottom", B = "___skrollable_id", V = /^(?:input|textarea|button|select)$/i, q = /^\s+|\s+$/g, M = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/, A = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi, F = /^(@?[a-z\-]+)\[(\w+)\]$/, $ = /-([a-z0-9_])/g, R = function(t, e) {
return e.toUpperCase();
}, U = /[\-+]?[\d]*\.?[\d]+/g, L = /\{\?\}/g, P = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g, O = /[a-z\-]+-gradient/g, W = "", G = "", N = function() {
var t = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
if (c) {
var e = c(o, null);
for (var i in e) if (W = i.match(t) || +i == i && e[i].match(t)) break;
if (!W) return W = G = "", void 0;
W = W[0], "-" === W.slice(0, 1) ? (G = W, W = {
"-webkit-":"webkit",
"-moz-":"Moz",
"-ms-":"ms",
"-o-":"O"
}[W]) :G = "-" + W.toLowerCase() + "-";
}
}, D = function() {
var e = t.requestAnimationFrame || t[W.toLowerCase() + "RequestAnimationFrame"], i = qe();
return (Ge || !e) && (e = function(e) {
var s = qe() - i, n = l.max(0, 1e3 / 60 - s);
return t.setTimeout(function() {
i = qe(), e();
}, n);
}), e;
}, Q = function() {
var e = t.cancelAnimationFrame || t[W.toLowerCase() + "CancelAnimationFrame"];
return (Ge || !e) && (e = function(e) {
return t.clearTimeout(e);
}), e;
}, j = {
begin:function() {
return 0;
},
end:function() {
return 1;
},
linear:function(t) {
return t;
},
quadratic:function(t) {
return t * t;
},
cubic:function(t) {
return t * t * t;
},
swing:function(t) {
return -l.cos(t * l.PI) / 2 + .5;
},
sqrt:function(t) {
return l.sqrt(t);
},
outCubic:function(t) {
return l.pow(t - 1, 3) + 1;
},
bounce:function(t) {
var e;
if (.5083 >= t) e = 3; else if (.8489 >= t) e = 9; else if (.96208 >= t) e = 27; else {
if (!(.99981 >= t)) return 1;
e = 91;
}
return 1 - l.abs(3 * l.cos(t * e * 1.028) / e);
}
};
s.prototype.refresh = function(t) {
var s, n, o = !1;
for (t === i ? (o = !0, le = [], We = 0, t = e.getElementsByTagName("*")) :t.length === i && (t = [ t ]), 
s = 0, n = t.length; n > s; s++) {
var a = t[s], r = a, l = [], c = fe, h = Ee, d = !1;
if (o && B in a && delete a[B], a.attributes) {
for (var u = 0, g = a.attributes.length; g > u; u++) {
var f = a.attributes[u];
if ("data-anchor-target" !== f.name) if ("data-smooth-scrolling" !== f.name) if ("data-edge-strategy" !== f.name) if ("data-emit-events" !== f.name) {
var p = f.name.match(M);
if (null !== p) {
var _ = {
props:f.value,
element:a,
eventType:f.name.replace($, R)
};
l.push(_);
var v = p[1];
v && (_.constant = v.substr(1));
var E = p[2];
/p$/.test(E) ? (_.isPercentage = !0, _.offset = (0 | E.slice(0, -1)) / 100) :_.offset = 0 | E;
var y = p[3], b = p[4] || y;
y && y !== x && y !== z ? (_.mode = "relative", _.anchors = [ y, b ]) :(_.mode = "absolute", 
y === z ? _.isEnd = !0 :_.isPercentage || (_.offset = _.offset * Fe));
}
} else d = !0; else h = f.value; else c = "off" !== f.value; else if (r = e.querySelector(f.value), 
null === r) throw 'Unable to find anchor target "' + f.value + '"';
}
if (l.length) {
var w, k, I;
!o && B in a ? (I = a[B], w = le[I].styleAttr, k = le[I].classAttr) :(I = a[B] = We++, 
w = a.style.cssText, k = Te(a)), le[I] = {
element:a,
styleAttr:w,
classAttr:k,
anchorTarget:r,
keyFrames:l,
smoothScrolling:c,
edgeStrategy:h,
emitEvents:d,
lastFrameIndex:-1
}, He(a, [ m ], []);
}
}
}
for (Se(), s = 0, n = t.length; n > s; s++) {
var C = le[t[s][B]];
C !== i && (Z(C), ee(C));
}
return re;
}, s.prototype.relativeToAbsolute = function(t, e, i) {
var s = n.clientHeight, o = t.getBoundingClientRect(), a = o.top, r = o.bottom - o.top;
return e === H ? a -= s :e === T && (a -= s / 2), i === H ? a += r :i === T && (a += r / 2), 
a += re.getScrollTop(), a + .5 | 0;
}, s.prototype.animateTo = function(t, e) {
e = e || {};
var s = qe(), n = re.getScrollTop();
return me = {
startTop:n,
topDiff:t - n,
targetTop:t,
duration:e.duration || k,
startTime:s,
endTime:s + (e.duration || k),
easing:j[e.easing || w],
done:e.done
}, me.topDiff || (me.done && me.done.call(re, !1), me = i), re;
}, s.prototype.stopAnimateTo = function() {
me && me.done && me.done.call(re, !0), me = i;
}, s.prototype.isAnimatingTo = function() {
return !!me;
}, s.prototype.isMobile = function() {
return Ge;
}, s.prototype.setScrollTop = function(e, i) {
return ve = i === !0, Ge ? Ne = l.min(l.max(e, 0), Ae) :t.scrollTo(0, e), re;
}, s.prototype.getScrollTop = function() {
return Ge ? Ne :t.pageYOffset || n.scrollTop || o.scrollTop || 0;
}, s.prototype.getMaxScrollTop = function() {
return Ae;
}, s.prototype.on = function(t, e) {
return he[t] = e, re;
}, s.prototype.off = function(t) {
return delete he[t], re;
}, s.prototype.destroy = function() {
var t = Q();
t(be), Ie(), He(n, [ E ], [ v, y, b ]);
for (var e = 0, s = le.length; s > e; e++) oe(le[e].element);
n.style.overflow = o.style.overflow = "", n.style.height = o.style.height = "", 
ce && a.setStyle(ce, "transform", "none"), re = i, ce = i, he = i, de = i, Ae = 0, 
Fe = 1, ue = i, ge = i, $e = "down", Re = -1, Le = 0, Pe = 0, Oe = !1, me = i, fe = i, 
pe = i, _e = i, ve = i, We = 0, Ee = i, Ge = !1, Ne = 0, ye = i;
};
var Y = function() {
var s, a, r, c, m, f, p, _, v, E, y, b;
we(n, [ h, d, u, g ].join(" "), function(t) {
var n = t.changedTouches[0];
for (c = t.target; 3 === c.nodeType; ) c = c.parentNode;
switch (m = n.clientY, f = n.clientX, E = t.timeStamp, V.test(c.tagName) || t.preventDefault(), 
t.type) {
case h:
s && s.blur(), re.stopAnimateTo(), s = c, a = p = m, r = f, v = E;
break;

case d:
V.test(c.tagName) && e.activeElement !== c && t.preventDefault(), _ = m - p, b = E - y, 
re.setScrollTop(Ne - _, !0), p = m, y = E;
break;

default:
case u:
case g:
var o = a - m, w = r - f, k = w * w + o * o;
if (49 > k) {
if (!V.test(s.tagName)) {
s.focus();
var I = e.createEvent("MouseEvents");
I.initMouseEvent("click", !0, !0, t.view, 1, n.screenX, n.screenY, n.clientX, n.clientY, t.ctrlKey, t.altKey, t.shiftKey, t.metaKey, 0, null), 
s.dispatchEvent(I);
}
return;
}
s = i;
var C = _ / b;
C = l.max(l.min(C, 3), -3);
var S = l.abs(C / ge), x = C * S + .5 * ge * S * S, z = re.getScrollTop() - x, T = 0;
z > Ae ? (T = (Ae - z) / x, z = Ae) :0 > z && (T = -z / x, z = 0), S *= 1 - T, re.animateTo(z + .5 | 0, {
easing:"outCubic",
duration:S
});
}
}), t.scrollTo(0, 0), n.style.overflow = o.style.overflow = "hidden";
}, K = function() {
var t, e, i, s, o, a, r, c, h, d, u, g = n.clientHeight, m = xe();
for (c = 0, h = le.length; h > c; c++) for (t = le[c], e = t.element, i = t.anchorTarget, 
s = t.keyFrames, o = 0, a = s.length; a > o; o++) r = s[o], d = r.offset, u = m[r.constant] || 0, 
r.frame = d, r.isPercentage && (d *= g, r.frame = d), "relative" === r.mode && (oe(e), 
r.frame = re.relativeToAbsolute(i, r.anchors[0], r.anchors[1]) - d, oe(e, !0)), 
r.frame += u, de && !r.isEnd && r.frame > Ae && (Ae = r.frame);
for (Ae = l.max(Ae, ze()), c = 0, h = le.length; h > c; c++) {
for (t = le[c], s = t.keyFrames, o = 0, a = s.length; a > o; o++) r = s[o], u = m[r.constant] || 0, 
r.isEnd && (r.frame = Ae - r.offset + u);
t.keyFrames.sort(Me);
}
}, X = function(t, e) {
for (var i = 0, s = le.length; s > i; i++) {
var n, o, l = le[i], c = l.element, h = l.smoothScrolling ? t :e, d = l.keyFrames, u = d.length, g = d[0], v = d[d.length - 1], E = h < g.frame, y = h > v.frame, b = E ? g :v, w = l.emitEvents, k = l.lastFrameIndex;
if (E || y) {
if (E && -1 === l.edge || y && 1 === l.edge) continue;
switch (E ? (He(c, [ f ], [ _, p ]), w && k > -1 && (Ce(c, g.eventType, $e), l.lastFrameIndex = -1)) :(He(c, [ _ ], [ f, p ]), 
w && u > k && (Ce(c, v.eventType, $e), l.lastFrameIndex = u)), l.edge = E ? -1 :1, 
l.edgeStrategy) {
case "reset":
oe(c);
continue;

case "ease":
h = b.frame;
break;

default:
case "set":
var I = b.props;
for (n in I) r.call(I, n) && (o = ne(I[n].value), 0 === n.indexOf("@") ? c.setAttribute(n.substr(1), o) :a.setStyle(c, n, o));
continue;
}
} else 0 !== l.edge && (He(c, [ m, p ], [ f, _ ]), l.edge = 0);
for (var C = 0; u - 1 > C; C++) if (h >= d[C].frame && h <= d[C + 1].frame) {
var S = d[C], x = d[C + 1];
for (n in S.props) if (r.call(S.props, n)) {
var z = (h - S.frame) / (x.frame - S.frame);
z = S.props[n].easing(z), o = se(S.props[n].value, x.props[n].value, z), o = ne(o), 
0 === n.indexOf("@") ? c.setAttribute(n.substr(1), o) :a.setStyle(c, n, o);
}
w && k !== C && ("down" === $e ? Ce(c, S.eventType, $e) :Ce(c, x.eventType, $e), 
l.lastFrameIndex = C);
break;
}
}
}, J = function() {
Oe && (Oe = !1, Se());
var t, e, s = re.getScrollTop(), n = qe();
if (me) n >= me.endTime ? (s = me.targetTop, t = me.done, me = i) :(e = me.easing((n - me.startTime) / me.duration), 
s = me.startTop + e * me.topDiff | 0), re.setScrollTop(s, !0); else if (!ve) {
var o = _e.targetTop - s;
o && (_e = {
startTop:Re,
topDiff:s - Re,
targetTop:s,
startTime:Ue,
endTime:Ue + pe
}), n <= _e.endTime && (e = j.sqrt((n - _e.startTime) / pe), s = _e.startTop + e * _e.topDiff | 0);
}
if (Ge && ce && a.setStyle(ce, "transform", "translate(0, " + -Ne + "px) " + ye), 
ve || Re !== s) {
$e = s > Re ? "down" :Re > s ? "up" :$e, ve = !1;
var r = {
curTop:s,
lastTop:Re,
maxTop:Ae,
direction:$e
}, l = he.beforerender && he.beforerender.call(re, r);
l !== !1 && (X(s, re.getScrollTop()), Re = s, he.render && he.render.call(re, r)), 
t && t.call(re, !1);
}
Ue = n;
}, Z = function(t) {
for (var e = 0, i = t.keyFrames.length; i > e; e++) {
for (var s, n, o, a, r = t.keyFrames[e], l = {}; null !== (a = A.exec(r.props)); ) o = a[1], 
n = a[2], s = o.match(F), null !== s ? (o = s[1], s = s[2]) :s = w, n = n.indexOf("!") ? te(n) :[ n.slice(1) ], 
l[o] = {
value:n,
easing:j[s]
};
r.props = l;
}
}, te = function(t) {
var e = [];
return P.lastIndex = 0, t = t.replace(P, function(t) {
return t.replace(U, function(t) {
return t / 255 * 100 + "%";
});
}), G && (O.lastIndex = 0, t = t.replace(O, function(t) {
return G + t;
})), t = t.replace(U, function(t) {
return e.push(+t), "{?}";
}), e.unshift(t), e;
}, ee = function(t) {
var e, i, s = {};
for (e = 0, i = t.keyFrames.length; i > e; e++) ie(t.keyFrames[e], s);
for (s = {}, e = t.keyFrames.length - 1; e >= 0; e--) ie(t.keyFrames[e], s);
}, ie = function(t, e) {
var i;
for (i in e) r.call(t.props, i) || (t.props[i] = e[i]);
for (i in t.props) e[i] = t.props[i];
}, se = function(t, e, i) {
var s, n = t.length;
if (n !== e.length) throw "Can't interpolate between \"" + t[0] + '" and "' + e[0] + '"';
var o = [ t[0] ];
for (s = 1; n > s; s++) o[s] = t[s] + (e[s] - t[s]) * i;
return o;
}, ne = function(t) {
var e = 1;
return L.lastIndex = 0, t[0].replace(L, function() {
return t[e++];
});
}, oe = function(t, e) {
t = [].concat(t);
for (var i, s, n = 0, o = t.length; o > n; n++) s = t[n], i = le[s[B]], i && (e ? (s.style.cssText = i.dirtyStyleAttr, 
He(s, i.dirtyClassAttr)) :(i.dirtyStyleAttr = s.style.cssText, i.dirtyClassAttr = Te(s), 
s.style.cssText = i.styleAttr, He(s, i.classAttr)));
}, ae = function() {
ye = "translateZ(0)", a.setStyle(ce, "transform", ye);
var t = c(ce), e = t.getPropertyValue("transform"), i = t.getPropertyValue(G + "transform"), s = e && "none" !== e || i && "none" !== i;
s || (ye = "");
};
a.setStyle = function(t, e, i) {
var s = t.style;
if (e = e.replace($, R).replace("-", ""), "zIndex" === e) s[e] = isNaN(i) ? i :"" + (0 | i); else if ("float" === e) s.styleFloat = s.cssFloat = i; else try {
W && (s[W + e.slice(0, 1).toUpperCase() + e.slice(1)] = i), s[e] = i;
} catch (n) {}
};
var re, le, ce, he, de, ue, ge, me, fe, pe, _e, ve, Ee, ye, be, we = a.addEvent = function(e, i, s) {
var n = function(e) {
return e = e || t.event, e.target || (e.target = e.srcElement), e.preventDefault || (e.preventDefault = function() {
e.returnValue = !1, e.defaultPrevented = !0;
}), s.call(this, e);
};
i = i.split(" ");
for (var o, a = 0, r = i.length; r > a; a++) o = i[a], e.addEventListener ? e.addEventListener(o, s, !1) :e.attachEvent("on" + o, n), 
De.push({
element:e,
name:o,
listener:s
});
}, ke = a.removeEvent = function(t, e, i) {
e = e.split(" ");
for (var s = 0, n = e.length; n > s; s++) t.removeEventListener ? t.removeEventListener(e[s], i, !1) :t.detachEvent("on" + e[s], i);
}, Ie = function() {
for (var t, e = 0, i = De.length; i > e; e++) t = De[e], ke(t.element, t.name, t.listener);
De = [];
}, Ce = function(t, e, i) {
he.keyframe && he.keyframe.call(re, t, e, i);
}, Se = function() {
var t = re.getScrollTop();
Ae = 0, de && !Ge && (o.style.height = ""), K(), de && !Ge && (o.style.height = Ae + n.clientHeight + "px"), 
Ge ? re.setScrollTop(l.min(re.getScrollTop(), Ae)) :re.setScrollTop(t, !0), ve = !0;
}, xe = function() {
var t, e, i = n.clientHeight, s = {};
for (t in ue) e = ue[t], "function" == typeof e ? e = e.call(re) :/p$/.test(e) && (e = e.slice(0, -1) / 100 * i), 
s[t] = e;
return s;
}, ze = function() {
var t, e = 0;
return ce && (e = l.max(ce.offsetHeight, ce.scrollHeight)), t = l.max(e, o.scrollHeight, o.offsetHeight, n.scrollHeight, n.offsetHeight, n.clientHeight), 
t - n.clientHeight;
}, Te = function(e) {
var i = "className";
return t.SVGElement && e instanceof t.SVGElement && (e = e[i], i = "baseVal"), e[i];
}, He = function(e, s, n) {
var o = "className";
if (t.SVGElement && e instanceof t.SVGElement && (e = e[o], o = "baseVal"), n === i) return e[o] = s, 
void 0;
for (var a = e[o], r = 0, l = n.length; l > r; r++) a = Ve(a).replace(Ve(n[r]), " ");
a = Be(a);
for (var c = 0, h = s.length; h > c; c++) -1 === Ve(a).indexOf(Ve(s[c])) && (a += " " + s[c]);
e[o] = Be(a);
}, Be = function(t) {
return t.replace(q, "");
}, Ve = function(t) {
return " " + t + " ";
}, qe = Date.now || function() {
return +new Date();
}, Me = function(t, e) {
return t.frame - e.frame;
}, Ae = 0, Fe = 1, $e = "down", Re = -1, Ue = qe(), Le = 0, Pe = 0, Oe = !1, We = 0, Ge = !1, Ne = 0, De = [];
"function" == typeof define && define.amd ? define([], function() {
return a;
}) :"undefined" != typeof module && module.exports ? module.exports = a :t.skrollr = a;
}(window, document);

var AnnotationModule = new Class({
Implements:[ Events, Options ],
options:{},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.points = _.map(this.root_el.getElements(".point"), function(t) {
var e = new Point(t);
return e.addEvents({
mouseover:this.activateEverythingById.bind(this),
mouseout:this.deactivateEverythingById.bind(this)
}), e;
}.bind(this)), this.articles = _.map(this.root_el.getElements("article"), function(t) {
var e = new Article(t);
return e.addEvents({
mouseover:this.activateEverythingById.bind(this),
mouseout:this.deactivateEverythingById.bind(this)
}), e;
}.bind(this));
},
activateEverythingById:function(t) {
this.activateArticleById(t), this.activatePointById(t);
},
deactivateEverythingById:function(t) {
this.deactivateArticleById(t), this.deactivatePointById(t);
},
activateArticleById:function(t) {
_.each(this.articles, function(e) {
var i = t === e.id ? "makeActive" :"makeInactive";
e[i]();
});
},
deactivateArticleById:function() {
_.each(this.articles, function(t) {
t.removeActiveInactive();
});
},
activatePointById:function(t) {
_.each(this.points, function(e) {
var i = t === e.id ? "makeActive" :"makeInactive";
e[i]();
});
},
deactivatePointById:function() {
_.each(this.points, function(t) {
t.removeActiveInactive();
});
}
}), Harrys = Harrys || {};

window.addEvent("domready", function() {
var t, e = document.getElement(".hero"), i = new HeroSection(e), s = $("waitlist_popup");
s && (t = new WaitlistModal(s));
var n, o = $$(".product-description"), a = document.getElement(".product.form");
if (a && (n = new ProductForm(a), n.addEvents({
waitlist_click:function(e) {
t && t.setId(e).show();
},
change:function(t) {
i && i.changeHeroByCartItem(t), _.each(o, function(e) {
e.get("data-id").toInt() === t.product.id ? e.setStyle("display", "block") :e.setStyle("display", "none");
});
}
}), n.active_mod_section.setIdByURL(), n.displayColorName()), _.each($$("body .video"), function(t) {
new Video(t);
}), _.each($$(".slideshow.product-gallery"), function(t) {
new Gallery(t, {
autoplay:!1
});
}), !Browser.Platform.ios && !Browser.Platform.android && !Harrys.IS_MOBILE) {
skrollr.init({
forceHeight:!1
});
}
var r = new URI().get("query").parseQueryString(), l = r["wraith-no-animate"] ? !1 :!0;
_.each($$("video.cover"), function(t) {
l || t.removeAttribute("autoplay"), new BgCoverVideo(t, {
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
var h = c.getElement(".arrow.left"), d = c.getElement(".arrow.right");
h.addEvent("click", function() {
Harrys.slideShow.show("previous", {
transition:"pushRight"
});
}), d.addEvent("click", function() {
Harrys.slideShow.show("next", {
transition:"pushLeft"
});
}), Hammer(c, {
drag:!1,
swipeVelocityX:.1
}).on("swipe", function(t) {
if (_.include([ "left", "right" ], t.gesture.direction)) {
var e, i;
"left" == t.gesture.direction ? (e = "pushLeft", i = "next") :"right" == t.gesture.direction && (e = "pushRight", 
i = "previous"), Harrys.slideShow.show(i, {
transition:e
});
}
});
}
var u = {
overview:document.getElement(".page.overview"),
shipping:document.getElement(".page.shipping"),
faq:document.getElement(".page.faq")
}, g = document.getElements(".tabs .tab");
g && _.each(g, function(t) {
t.addEvent("click", function() {
var e = t.get("data-page");
_.each(u, function(t) {
t && t.hide();
}), u[e] && (u[e].show(), new Fx.Scroll(window, {
offset:{
x:0,
y:-50
}
}).toElement(u[e])), _.each(g, function(t) {
t.removeClass("active");
}), t.addClass("active");
});
});
var m = document.getElements(".product.form .extra-info .link");
if (m && _.each(m, function(t) {
t.addEvent("click", function() {
var t;
g && (t = _.find(g, function(t) {
return "shipping" === t.get("data-page");
}), _.each(g, function(t) {
t.removeClass("active");
}), t && t.addClass("active")), u.shipping && (_.each(u, function(t) {
t && t.hide();
}), u.shipping.show(), new Fx.Scroll(window).toElement(u.shipping));
});
}), u.faq) {
var f = u.faq.getElements("article");
_.each(f, function(t) {
var e = t.getElement("h3"), i = t.getElement(".open-close");
e.addEvent("click", function() {
t.toggleClass("open");
}), i.addEvent("click", function() {
t.toggleClass("open");
});
});
}
_.each($$(".module.annotation"), function(t) {
new AnnotationModule(t);
});
});