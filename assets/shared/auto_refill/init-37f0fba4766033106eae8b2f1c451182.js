function init() {
var t = (_.map($$("[data-product-features]"), function(t) {
return new ProductFeatures(t);
}), $("custom_form")), e = $("recommended_form");
_.each(Harrys.recommended_plans, function(t) {
var e = $(t.name + "_form");
e && new PlanForm(e, {
blades:t.blades,
cream:t.cream,
interval:30 * t.interval,
enroll_type:t.name.capitalize(),
sku:t.sku
});
});
var i = new URI(document.location).get("data") || {};
t && new CustomPlanForm(t, i), e && new RecommendedForm(e);
var s = $("custom_link");
s && s.addEvent("click", function() {
s.getParent(".custom-intro").toggleClass("arrow"), t.toggle();
});
var n = $("content"), a = n ? n :window;
_.each($$(".footer-cta"), function(t) {
var e = t.getElement(".sticky-cta");
e && a.addEvent("scroll", function() {
var i = t.getOffsets().y + t.getSize().y, s = a.getScroll().y + a.getSize().y;
s >= i ? e.addClass("stopped") :e.removeClass("stopped");
});
});
}

var Harrys = Harrys || {}, PlanForm = new Class({
Implements:[ Events, Options ],
options:{
blades:8,
cream:2,
gel:0,
aftershave:0,
interval:60,
enroll_type:"",
id:""
},
initialize:function(t, e) {
this.setOptions(e), this.el = t, this.button = t.getElement("button.enroll-btn"), 
this.button && this.button.addEvent("click", function() {
this._submit();
}.bind(this));
},
_submit:function() {
var t = {
no_show_mini_cart:!0
};
this.options.id && Harrys.cart.addItem(new CartItem({
id:this.options.id,
quantity:1
}), t), !this.options.id && this.options.blades > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByPackSize(this.options.blades).id,
quantity:1,
customizations:{
interval:this.options.interval
}
}), t), !this.options.id && this.options.cream > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).id,
quantity:this.options.cream,
customizations:{
interval:this.options.interval
}
}), t), !this.options.id && this.options.gel > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_GEL_FOUR_OZ).id,
quantity:this.options.gel,
customizations:{
interval:this.options.interval
}
}), t), !this.options.id && this.options.aftershave > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByUid(Harrys.productIds.PACKAGED_AFTER_SHAVE_ONE_OZ).id,
quantity:this.options.aftershave,
customizations:{
interval:this.options.interval
}
}), t), Harrys.analytics.trackAutoRefillEnroll(this.options.enroll_type), setTimeout(function() {
window.location = "/cart";
}, 200);
}
}), Harrys = Harrys || {}, CustomPlanForm = new Class({
Extends:PlanForm,
options:{
enroll_type:"Custom"
},
initialize:function(t, e) {
function i() {
var t = Harrys.productsManager.findByPackSize(a.options.blades);
o.set("text", "$" + (t ? (t.price / a.options.blades).toFixed(2) :0));
}
function s() {
var t = Harrys.productsManager.findByPackSize(a.options.blades), e = t ? t.price.toInt() :0, i = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).price * a.options.cream.toInt(), s = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_GEL_FOUR_OZ).price * a.options.gel.toInt(), n = Harrys.productsManager.findByUid(Harrys.productIds.PACKAGED_AFTER_SHAVE_ONE_OZ).price * a.options.aftershave.toInt(), o = e + i + s + n;
r.set("text", "$" + o.toFixed(2));
}
function n(t, e, n, o) {
var r = _.map(t.getElements("option"), function(t) {
return t.get("value");
});
r.contains(a.options[e]) && t.set("value", a.options[e]), t.addEvent("change", function() {
var r = {};
r[e] = t.get("value"), a.setOptions(r), o && i(), n && s();
}.bind(a));
}
var a = this, o = t.getElement(".blade-cost"), r = t.getElement(".total-cost");
this.setOptions(e), this.parent(t), n(t.getElement("#blades_option"), "blades", !0, !0), 
n(t.getElement("#cream_option"), "cream", !0), n(t.getElement("#gel_option"), "gel", !0), 
n(t.getElement("#aftershave_option"), "aftershave", !0), n(t.getElement("#interval_option"), "interval");
}
}), Harrys = Harrys || {}, RecommendedForm = new Class({
Implements:[ Events, Options ],
types:{
everyday:{
blades:8,
cream:2,
interval:60
},
regular:{
blades:8,
cream:2,
interval:120
},
occasional:{
blades:8,
cream:2,
interval:180
}
},
DAYS_IN_MONTH:30,
ANIMATION_TIME:500,
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, Harrys.IS_MOBILE && (this.toggle = new SlideToggle(this.root_el.getElement(".slide-toggle"))), 
this.button = this.root_el.getElement("button.enroll-btn"), this.interval_el = this.root_el.getElement(".interval .count"), 
this.total_price_el = this.root_el.getElement(".total-price"), this.month_price_el = this.root_el.getElement(".month-price");
var i = Harrys.IS_MOBILE ? -53 :0, s = new Fx.Scroll(window, {
offset:{
x:0,
y:i
}
});
this.toggle && this.toggle.addEvent("change", function(t) {
this.updateView(this.types[t]), s.toElement(this.root_el);
}.bind(this)), this.button && this.button.addEvent("click", function() {
this._submit();
}.bind(this));
},
updateView:function(t) {
var e = t.interval / this.DAYS_IN_MONTH, i = this.root_el.getElement(".interval");
i.addClass("animate"), setTimeout(function() {
this.interval_el.set("text", e);
}.bind(this), .5 * this.ANIMATION_TIME), setTimeout(function() {
i.removeClass("animate");
}.bind(this), this.ANIMATION_TIME);
var s = Harrys.productsManager.findByPackSize(t.blades), n = s ? s.price.toInt() :0, a = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).price * t.cream.toInt(), o = n + a;
this.total_price_el.set("text", o), this.month_price_el.set("text", (o / e).toFixed(2));
},
_submit:function() {
var t = this.types[this.toggle.getValue()], e = {
no_show_mini_cart:!0
};
t.blades > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByPackSize(t.blades).id,
quantity:1,
customizations:{
interval:t.interval
}
}), e), t.cream > 0 && Harrys.cart.addItem(new CartItem({
id:Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).id,
quantity:t.cream,
customizations:{
interval:t.interval
}
}), e), Harrys.analytics.trackAutoRefillEnroll(t.enroll_type), setTimeout(function() {
window.location = "/cart";
}, 200);
}
}), ProductFeatures = new Class({
Implements:[ Events, Options ],
options:{
action_selector:"[data-product-action]",
feature_list_selector:"[data-product-feature-list]",
image_selector:"[data-product-image]",
dot_selector:"[data-product-dot]"
},
initialize:function(t, e) {
this.setOptions(e), this.root_el = t, this.action_els = this.root_el.getElements(this.options.action_selector), 
this.feature_list_els = this.root_el.getElements(this.options.feature_list_selector), 
this.image_els = this.root_el.getElements(this.options.image_selector), this.dot_els = this.root_el.getElements(this.options.dot_selector), 
_.each(this.action_els, function(t) {
var e = t.get("data-product-action");
t.addEvent("mouseover", function() {
this.changeActiveProduct(e);
}.bind(this));
}.bind(this)), this.dot_els.length && (this.hammer = new Hammer(this.root_el, {
velocity:.01
}), this.hammer.on("swipe", function(t) {
var e = this.getActiveDotEl(), i = this.dot_els.indexOf(e), s = i + (2 === t.direction ? 1 :-1);
if (0 > s || s > this.dot_els.length - 1) return !1;
var n = this.dot_els[s].get("data-product-dot");
this.changeActiveProduct(n);
}.bind(this)), this.root_el.addEvent("click", function() {
var t = this.getActiveDotEl(), e = this.dot_els.indexOf(t), i = e + 1;
i > this.dot_els.length - 1 && (i = 0);
var s = this.dot_els[i].get("data-product-dot");
this.changeActiveProduct(s);
}.bind(this)));
},
changeActiveProduct:function(t) {
var e = this.getFeatureListElByName(t), i = this.getImageElByName(t), s = this.getActionElByName(t), n = this.getDotElByName(t);
this.feature_list_els.removeClass("active"), this.image_els.removeClass("active"), 
this.action_els.removeClass("active"), this.dot_els.removeClass("active"), e && e.addClass("active"), 
i && i.addClass("active"), s && s.addClass("active"), n && n.addClass("active");
},
getFeatureListElByName:function(t) {
return _.find(this.feature_list_els, function(e) {
return t === e.get("data-product-feature-list");
}.bind(this));
},
getImageElByName:function(t) {
return _.find(this.image_els, function(e) {
return t === e.get("data-product-image");
}.bind(this));
},
getActionElByName:function(t) {
return _.find(this.action_els, function(e) {
return t === e.get("data-product-action");
}.bind(this));
},
getDotElByName:function(t) {
return _.find(this.dot_els, function(e) {
return t === e.get("data-product-dot");
}.bind(this));
},
getActiveDotEl:function() {
return _.find(this.dot_els, function(t) {
return t.hasClass("active");
});
},
getActiveProductName:function() {
return this.getActiveDotEl().get("data-product-dot");
}
}), Harrys = Harrys || {};

window.addEvent("domready", init);