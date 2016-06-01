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
var n = new URI(document.location).get("data") || {};
t && new CustomPlanForm(t, n), e && new RecommendedForm(e);
var i = $("custom_link");
i && i.addEvent("click", function() {
i.getParent(".custom-intro").toggleClass("arrow"), t.toggle();
});
var r = $("content"), s = r ? r :window;
_.each($$(".footer-cta"), function(t) {
var e = t.getElement(".sticky-cta");
e && s.addEvent("scroll", function() {
var n = t.getOffsets().y + t.getSize().y, i = s.getScroll().y + s.getSize().y;
i >= n ? e.addClass("stopped") :e.removeClass("stopped");
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
function n() {
var t = Harrys.productsManager.findByPackSize(s.options.blades);
a.set("text", "$" + (t ? (t.price / s.options.blades).toFixed(2) :0));
}
function i() {
var t = Harrys.productsManager.findByPackSize(s.options.blades), e = t ? t.price.toInt() :0, n = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).price * s.options.cream.toInt(), i = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_GEL_FOUR_OZ).price * s.options.gel.toInt(), r = Harrys.productsManager.findByUid(Harrys.productIds.PACKAGED_AFTER_SHAVE_ONE_OZ).price * s.options.aftershave.toInt(), a = e + n + i + r;
o.set("text", "$" + a.toFixed(2));
}
function r(t, e, r, a) {
var o = _.map(t.getElements("option"), function(t) {
return t.get("value");
});
o.contains(s.options[e]) && t.set("value", s.options[e]), t.addEvent("change", function() {
var o = {};
o[e] = t.get("value"), s.setOptions(o), a && n(), r && i();
}.bind(s));
}
var s = this, a = t.getElement(".blade-cost"), o = t.getElement(".total-cost");
this.setOptions(e), this.parent(t), r(t.getElement("#blades_option"), "blades", !0, !0), 
r(t.getElement("#cream_option"), "cream", !0), r(t.getElement("#gel_option"), "gel", !0), 
r(t.getElement("#aftershave_option"), "aftershave", !0), r(t.getElement("#interval_option"), "interval");
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
var n = Harrys.IS_MOBILE ? -53 :0, i = new Fx.Scroll(window, {
offset:{
x:0,
y:n
}
});
this.toggle && this.toggle.addEvent("change", function(t) {
this.updateView(this.types[t]), i.toElement(this.root_el);
}.bind(this)), this.button && this.button.addEvent("click", function() {
this._submit();
}.bind(this));
},
updateView:function(t) {
var e = t.interval / this.DAYS_IN_MONTH, n = this.root_el.getElement(".interval");
n.addClass("animate"), setTimeout(function() {
this.interval_el.set("text", e);
}.bind(this), .5 * this.ANIMATION_TIME), setTimeout(function() {
n.removeClass("animate");
}.bind(this), this.ANIMATION_TIME);
var i = Harrys.productsManager.findByPackSize(t.blades), r = i ? i.price.toInt() :0, s = Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).price * t.cream.toInt(), a = r + s;
this.total_price_el.set("text", a), this.month_price_el.set("text", (a / e).toFixed(2));
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
});

/*! Hammer.JS - v2.0.4 - 2014-09-28
 * http://hammerjs.github.io/
 *
 * Copyright (c) 2014 Jorik Tangelder;
 * Licensed under the MIT license */
!function(t, e, n, i) {
"use strict";
function r(t, e, n) {
return setTimeout(c(t, n), e);
}
function s(t, e, n) {
return Array.isArray(t) ? (a(t, n[e], n), !0) :!1;
}
function a(t, e, n) {
var r;
if (t) if (t.forEach) t.forEach(e, n); else if (t.length !== i) for (r = 0; r < t.length; ) e.call(n, t[r], r, t), 
r++; else for (r in t) t.hasOwnProperty(r) && e.call(n, t[r], r, t);
}
function o(t, e, n) {
for (var r = Object.keys(e), s = 0; s < r.length; ) (!n || n && t[r[s]] === i) && (t[r[s]] = e[r[s]]), 
s++;
return t;
}
function u(t, e) {
return o(t, e, !0);
}
function l(t, e, n) {
var i, r = e.prototype;
i = t.prototype = Object.create(r), i.constructor = t, i._super = r, n && o(i, n);
}
function c(t, e) {
return function() {
return t.apply(e, arguments);
};
}
function d(t, e) {
return typeof t == ce ? t.apply(e ? e[0] || i :i, e) :t;
}
function h(t, e) {
return t === i ? e :t;
}
function f(t, e, n) {
a(g(e), function(e) {
t.addEventListener(e, n, !1);
});
}
function m(t, e, n) {
a(g(e), function(e) {
t.removeEventListener(e, n, !1);
});
}
function p(t, e) {
for (;t; ) {
if (t == e) return !0;
t = t.parentNode;
}
return !1;
}
function _(t, e) {
return t.indexOf(e) > -1;
}
function g(t) {
return t.trim().split(/\s+/g);
}
function v(t, e, n) {
if (t.indexOf && !n) return t.indexOf(e);
for (var i = 0; i < t.length; ) {
if (n && t[i][n] == e || !n && t[i] === e) return i;
i++;
}
return -1;
}
function y(t) {
return Array.prototype.slice.call(t, 0);
}
function M(t, e, n) {
for (var i = [], r = [], s = 0; s < t.length; ) {
var a = e ? t[s][e] :t[s];
v(r, a) < 0 && i.push(t[s]), r[s] = a, s++;
}
return n && (i = e ? i.sort(function(t, n) {
return t[e] > n[e];
}) :i.sort()), i;
}
function b(t, e) {
for (var n, r, s = e[0].toUpperCase() + e.slice(1), a = 0; a < ue.length; ) {
if (n = ue[a], r = n ? n + s :e, r in t) return r;
a++;
}
return i;
}
function w() {
return me++;
}
function L(t) {
var e = t.ownerDocument;
return e.defaultView || e.parentWindow;
}
function k(t, e) {
var n = this;
this.manager = t, this.callback = e, this.element = t.element, this.target = t.options.inputTarget, 
this.domHandler = function(e) {
d(t.options.enable, [ t ]) && n.handler(e);
}, this.init();
}
function T(t) {
var e, n = t.options.inputClass;
return new (e = n ? n :ge ? F :ve ? R :_e ? U :z)(t, Y);
}
function Y(t, e, n) {
var i = n.pointers.length, r = n.changedPointers.length, s = e & ke && i - r === 0, a = e & (Ye | Ee) && i - r === 0;
n.isFirst = !!s, n.isFinal = !!a, s && (t.session = {}), n.eventType = e, E(t, n), 
t.emit("hammer.input", n), t.recognize(n), t.session.prevInput = n;
}
function E(t, e) {
var n = t.session, i = e.pointers, r = i.length;
n.firstInput || (n.firstInput = x(e)), r > 1 && !n.firstMultiple ? n.firstMultiple = x(e) :1 === r && (n.firstMultiple = !1);
var s = n.firstInput, a = n.firstMultiple, o = a ? a.center :s.center, u = e.center = C(i);
e.timeStamp = fe(), e.deltaTime = e.timeStamp - s.timeStamp, e.angle = j(o, u), 
e.distance = I(o, u), D(n, e), e.offsetDirection = A(e.deltaX, e.deltaY), e.scale = a ? P(a.pointers, i) :1, 
e.rotation = a ? H(a.pointers, i) :0, S(n, e);
var l = t.element;
p(e.srcEvent.target, l) && (l = e.srcEvent.target), e.target = l;
}
function D(t, e) {
var n = e.center, i = t.offsetDelta || {}, r = t.prevDelta || {}, s = t.prevInput || {};
(e.eventType === ke || s.eventType === Ye) && (r = t.prevDelta = {
x:s.deltaX || 0,
y:s.deltaY || 0
}, i = t.offsetDelta = {
x:n.x,
y:n.y
}), e.deltaX = r.x + (n.x - i.x), e.deltaY = r.y + (n.y - i.y);
}
function S(t, e) {
var n, r, s, a, o = t.lastInterval || e, u = e.timeStamp - o.timeStamp;
if (e.eventType != Ee && (u > Le || o.velocity === i)) {
var l = o.deltaX - e.deltaX, c = o.deltaY - e.deltaY, d = O(u, l, c);
r = d.x, s = d.y, n = he(d.x) > he(d.y) ? d.x :d.y, a = A(l, c), t.lastInterval = e;
} else n = o.velocity, r = o.velocityX, s = o.velocityY, a = o.direction;
e.velocity = n, e.velocityX = r, e.velocityY = s, e.direction = a;
}
function x(t) {
for (var e = [], n = 0; n < t.pointers.length; ) e[n] = {
clientX:de(t.pointers[n].clientX),
clientY:de(t.pointers[n].clientY)
}, n++;
return {
timeStamp:fe(),
pointers:e,
center:C(e),
deltaX:t.deltaX,
deltaY:t.deltaY
};
}
function C(t) {
var e = t.length;
if (1 === e) return {
x:de(t[0].clientX),
y:de(t[0].clientY)
};
for (var n = 0, i = 0, r = 0; e > r; ) n += t[r].clientX, i += t[r].clientY, r++;
return {
x:de(n / e),
y:de(i / e)
};
}
function O(t, e, n) {
return {
x:e / t || 0,
y:n / t || 0
};
}
function A(t, e) {
return t === e ? De :he(t) >= he(e) ? t > 0 ? Se :xe :e > 0 ? Ce :Oe;
}
function I(t, e, n) {
n || (n = He);
var i = e[n[0]] - t[n[0]], r = e[n[1]] - t[n[1]];
return Math.sqrt(i * i + r * r);
}
function j(t, e, n) {
n || (n = He);
var i = e[n[0]] - t[n[0]], r = e[n[1]] - t[n[1]];
return 180 * Math.atan2(r, i) / Math.PI;
}
function H(t, e) {
return j(e[1], e[0], Pe) - j(t[1], t[0], Pe);
}
function P(t, e) {
return I(e[0], e[1], Pe) / I(t[0], t[1], Pe);
}
function z() {
this.evEl = Fe, this.evWin = Ne, this.allow = !0, this.pressed = !1, k.apply(this, arguments);
}
function F() {
this.evEl = $e, this.evWin = Ue, k.apply(this, arguments), this.store = this.manager.session.pointerEvents = [];
}
function N() {
this.evTarget = Be, this.evWin = Ge, this.started = !1, k.apply(this, arguments);
}
function W(t, e) {
var n = y(t.touches), i = y(t.changedTouches);
return e & (Ye | Ee) && (n = M(n.concat(i), "identifier", !0)), [ n, i ];
}
function R() {
this.evTarget = Ve, this.targetIds = {}, k.apply(this, arguments);
}
function $(t, e) {
var n = y(t.touches), i = this.targetIds;
if (e & (ke | Te) && 1 === n.length) return i[n[0].identifier] = !0, [ n, n ];
var r, s, a = y(t.changedTouches), o = [], u = this.target;
if (s = n.filter(function(t) {
return p(t.target, u);
}), e === ke) for (r = 0; r < s.length; ) i[s[r].identifier] = !0, r++;
for (r = 0; r < a.length; ) i[a[r].identifier] && o.push(a[r]), e & (Ye | Ee) && delete i[a[r].identifier], 
r++;
return o.length ? [ M(s.concat(o), "identifier", !0), o ] :void 0;
}
function U() {
k.apply(this, arguments);
var t = c(this.handler, this);
this.touch = new R(this.manager, t), this.mouse = new z(this.manager, t);
}
function q(t, e) {
this.manager = t, this.set(e);
}
function B(t) {
if (_(t, en)) return en;
var e = _(t, nn), n = _(t, rn);
return e && n ? nn + " " + rn :e || n ? e ? nn :rn :_(t, tn) ? tn :Qe;
}
function G(t) {
this.id = w(), this.manager = null, this.options = u(t || {}, this.defaults), this.options.enable = h(this.options.enable, !0), 
this.state = sn, this.simultaneous = {}, this.requireFail = [];
}
function J(t) {
return t & cn ? "cancel" :t & un ? "end" :t & on ? "move" :t & an ? "start" :"";
}
function V(t) {
return t == Oe ? "down" :t == Ce ? "up" :t == Se ? "left" :t == xe ? "right" :"";
}
function X(t, e) {
var n = e.manager;
return n ? n.get(t) :t;
}
function K() {
G.apply(this, arguments);
}
function Z() {
K.apply(this, arguments), this.pX = null, this.pY = null;
}
function Q() {
K.apply(this, arguments);
}
function te() {
G.apply(this, arguments), this._timer = null, this._input = null;
}
function ee() {
K.apply(this, arguments);
}
function ne() {
K.apply(this, arguments);
}
function ie() {
G.apply(this, arguments), this.pTime = !1, this.pCenter = !1, this._timer = null, 
this._input = null, this.count = 0;
}
function re(t, e) {
return e = e || {}, e.recognizers = h(e.recognizers, re.defaults.preset), new se(t, e);
}
function se(t, e) {
e = e || {}, this.options = u(e, re.defaults), this.options.inputTarget = this.options.inputTarget || t, 
this.handlers = {}, this.session = {}, this.recognizers = [], this.element = t, 
this.input = T(this), this.touchAction = new q(this, this.options.touchAction), 
ae(this, !0), a(e.recognizers, function(t) {
var e = this.add(new t[0](t[1]));
t[2] && e.recognizeWith(t[2]), t[3] && e.requireFailure(t[3]);
}, this);
}
function ae(t, e) {
var n = t.element;
a(t.options.cssProps, function(t, i) {
n.style[b(n.style, i)] = e ? t :"";
});
}
function oe(t, n) {
var i = e.createEvent("Event");
i.initEvent(t, !0, !0), i.gesture = n, n.target.dispatchEvent(i);
}
var ue = [ "", "webkit", "moz", "MS", "ms", "o" ], le = e.createElement("div"), ce = "function", de = Math.round, he = Math.abs, fe = Date.now, me = 1, pe = /mobile|tablet|ip(ad|hone|od)|android/i, _e = "ontouchstart" in t, ge = b(t, "PointerEvent") !== i, ve = _e && pe.test(navigator.userAgent), ye = "touch", Me = "pen", be = "mouse", we = "kinect", Le = 25, ke = 1, Te = 2, Ye = 4, Ee = 8, De = 1, Se = 2, xe = 4, Ce = 8, Oe = 16, Ae = Se | xe, Ie = Ce | Oe, je = Ae | Ie, He = [ "x", "y" ], Pe = [ "clientX", "clientY" ];
k.prototype = {
handler:function() {},
init:function() {
this.evEl && f(this.element, this.evEl, this.domHandler), this.evTarget && f(this.target, this.evTarget, this.domHandler), 
this.evWin && f(L(this.element), this.evWin, this.domHandler);
},
destroy:function() {
this.evEl && m(this.element, this.evEl, this.domHandler), this.evTarget && m(this.target, this.evTarget, this.domHandler), 
this.evWin && m(L(this.element), this.evWin, this.domHandler);
}
};
var ze = {
mousedown:ke,
mousemove:Te,
mouseup:Ye
}, Fe = "mousedown", Ne = "mousemove mouseup";
l(z, k, {
handler:function(t) {
var e = ze[t.type];
e & ke && 0 === t.button && (this.pressed = !0), e & Te && 1 !== t.which && (e = Ye), 
this.pressed && this.allow && (e & Ye && (this.pressed = !1), this.callback(this.manager, e, {
pointers:[ t ],
changedPointers:[ t ],
pointerType:be,
srcEvent:t
}));
}
});
var We = {
pointerdown:ke,
pointermove:Te,
pointerup:Ye,
pointercancel:Ee,
pointerout:Ee
}, Re = {
2:ye,
3:Me,
4:be,
5:we
}, $e = "pointerdown", Ue = "pointermove pointerup pointercancel";
t.MSPointerEvent && ($e = "MSPointerDown", Ue = "MSPointerMove MSPointerUp MSPointerCancel"), 
l(F, k, {
handler:function(t) {
var e = this.store, n = !1, i = t.type.toLowerCase().replace("ms", ""), r = We[i], s = Re[t.pointerType] || t.pointerType, a = s == ye, o = v(e, t.pointerId, "pointerId");
r & ke && (0 === t.button || a) ? 0 > o && (e.push(t), o = e.length - 1) :r & (Ye | Ee) && (n = !0), 
0 > o || (e[o] = t, this.callback(this.manager, r, {
pointers:e,
changedPointers:[ t ],
pointerType:s,
srcEvent:t
}), n && e.splice(o, 1));
}
});
var qe = {
touchstart:ke,
touchmove:Te,
touchend:Ye,
touchcancel:Ee
}, Be = "touchstart", Ge = "touchstart touchmove touchend touchcancel";
l(N, k, {
handler:function(t) {
var e = qe[t.type];
if (e === ke && (this.started = !0), this.started) {
var n = W.call(this, t, e);
e & (Ye | Ee) && n[0].length - n[1].length === 0 && (this.started = !1), this.callback(this.manager, e, {
pointers:n[0],
changedPointers:n[1],
pointerType:ye,
srcEvent:t
});
}
}
});
var Je = {
touchstart:ke,
touchmove:Te,
touchend:Ye,
touchcancel:Ee
}, Ve = "touchstart touchmove touchend touchcancel";
l(R, k, {
handler:function(t) {
var e = Je[t.type], n = $.call(this, t, e);
n && this.callback(this.manager, e, {
pointers:n[0],
changedPointers:n[1],
pointerType:ye,
srcEvent:t
});
}
}), l(U, k, {
handler:function(t, e, n) {
var i = n.pointerType == ye, r = n.pointerType == be;
if (i) this.mouse.allow = !1; else if (r && !this.mouse.allow) return;
e & (Ye | Ee) && (this.mouse.allow = !0), this.callback(t, e, n);
},
destroy:function() {
this.touch.destroy(), this.mouse.destroy();
}
});
var Xe = b(le.style, "touchAction"), Ke = Xe !== i, Ze = "compute", Qe = "auto", tn = "manipulation", en = "none", nn = "pan-x", rn = "pan-y";
q.prototype = {
set:function(t) {
t == Ze && (t = this.compute()), Ke && (this.manager.element.style[Xe] = t), this.actions = t.toLowerCase().trim();
},
update:function() {
this.set(this.manager.options.touchAction);
},
compute:function() {
var t = [];
return a(this.manager.recognizers, function(e) {
d(e.options.enable, [ e ]) && (t = t.concat(e.getTouchAction()));
}), B(t.join(" "));
},
preventDefaults:function(t) {
if (!Ke) {
var e = t.srcEvent, n = t.offsetDirection;
if (this.manager.session.prevented) return void e.preventDefault();
var i = this.actions, r = _(i, en), s = _(i, rn), a = _(i, nn);
return r || s && n & Ae || a && n & Ie ? this.preventSrc(e) :void 0;
}
},
preventSrc:function(t) {
this.manager.session.prevented = !0, t.preventDefault();
}
};
var sn = 1, an = 2, on = 4, un = 8, ln = un, cn = 16, dn = 32;
G.prototype = {
defaults:{},
set:function(t) {
return o(this.options, t), this.manager && this.manager.touchAction.update(), this;
},
recognizeWith:function(t) {
if (s(t, "recognizeWith", this)) return this;
var e = this.simultaneous;
return t = X(t, this), e[t.id] || (e[t.id] = t, t.recognizeWith(this)), this;
},
dropRecognizeWith:function(t) {
return s(t, "dropRecognizeWith", this) ? this :(t = X(t, this), delete this.simultaneous[t.id], 
this);
},
requireFailure:function(t) {
if (s(t, "requireFailure", this)) return this;
var e = this.requireFail;
return t = X(t, this), -1 === v(e, t) && (e.push(t), t.requireFailure(this)), this;
},
dropRequireFailure:function(t) {
if (s(t, "dropRequireFailure", this)) return this;
t = X(t, this);
var e = v(this.requireFail, t);
return e > -1 && this.requireFail.splice(e, 1), this;
},
hasRequireFailures:function() {
return this.requireFail.length > 0;
},
canRecognizeWith:function(t) {
return !!this.simultaneous[t.id];
},
emit:function(t) {
function e(e) {
n.manager.emit(n.options.event + (e ? J(i) :""), t);
}
var n = this, i = this.state;
un > i && e(!0), e(), i >= un && e(!0);
},
tryEmit:function(t) {
return this.canEmit() ? this.emit(t) :void (this.state = dn);
},
canEmit:function() {
for (var t = 0; t < this.requireFail.length; ) {
if (!(this.requireFail[t].state & (dn | sn))) return !1;
t++;
}
return !0;
},
recognize:function(t) {
var e = o({}, t);
return d(this.options.enable, [ this, e ]) ? (this.state & (ln | cn | dn) && (this.state = sn), 
this.state = this.process(e), void (this.state & (an | on | un | cn) && this.tryEmit(e))) :(this.reset(), 
void (this.state = dn));
},
process:function() {},
getTouchAction:function() {},
reset:function() {}
}, l(K, G, {
defaults:{
pointers:1
},
attrTest:function(t) {
var e = this.options.pointers;
return 0 === e || t.pointers.length === e;
},
process:function(t) {
var e = this.state, n = t.eventType, i = e & (an | on), r = this.attrTest(t);
return i && (n & Ee || !r) ? e | cn :i || r ? n & Ye ? e | un :e & an ? e | on :an :dn;
}
}), l(Z, K, {
defaults:{
event:"pan",
threshold:10,
pointers:1,
direction:je
},
getTouchAction:function() {
var t = this.options.direction, e = [];
return t & Ae && e.push(rn), t & Ie && e.push(nn), e;
},
directionTest:function(t) {
var e = this.options, n = !0, i = t.distance, r = t.direction, s = t.deltaX, a = t.deltaY;
return r & e.direction || (e.direction & Ae ? (r = 0 === s ? De :0 > s ? Se :xe, 
n = s != this.pX, i = Math.abs(t.deltaX)) :(r = 0 === a ? De :0 > a ? Ce :Oe, n = a != this.pY, 
i = Math.abs(t.deltaY))), t.direction = r, n && i > e.threshold && r & e.direction;
},
attrTest:function(t) {
return K.prototype.attrTest.call(this, t) && (this.state & an || !(this.state & an) && this.directionTest(t));
},
emit:function(t) {
this.pX = t.deltaX, this.pY = t.deltaY;
var e = V(t.direction);
e && this.manager.emit(this.options.event + e, t), this._super.emit.call(this, t);
}
}), l(Q, K, {
defaults:{
event:"pinch",
threshold:0,
pointers:2
},
getTouchAction:function() {
return [ en ];
},
attrTest:function(t) {
return this._super.attrTest.call(this, t) && (Math.abs(t.scale - 1) > this.options.threshold || this.state & an);
},
emit:function(t) {
if (this._super.emit.call(this, t), 1 !== t.scale) {
var e = t.scale < 1 ? "in" :"out";
this.manager.emit(this.options.event + e, t);
}
}
}), l(te, G, {
defaults:{
event:"press",
pointers:1,
time:500,
threshold:5
},
getTouchAction:function() {
return [ Qe ];
},
process:function(t) {
var e = this.options, n = t.pointers.length === e.pointers, i = t.distance < e.threshold, s = t.deltaTime > e.time;
if (this._input = t, !i || !n || t.eventType & (Ye | Ee) && !s) this.reset(); else if (t.eventType & ke) this.reset(), 
this._timer = r(function() {
this.state = ln, this.tryEmit();
}, e.time, this); else if (t.eventType & Ye) return ln;
return dn;
},
reset:function() {
clearTimeout(this._timer);
},
emit:function(t) {
this.state === ln && (t && t.eventType & Ye ? this.manager.emit(this.options.event + "up", t) :(this._input.timeStamp = fe(), 
this.manager.emit(this.options.event, this._input)));
}
}), l(ee, K, {
defaults:{
event:"rotate",
threshold:0,
pointers:2
},
getTouchAction:function() {
return [ en ];
},
attrTest:function(t) {
return this._super.attrTest.call(this, t) && (Math.abs(t.rotation) > this.options.threshold || this.state & an);
}
}), l(ne, K, {
defaults:{
event:"swipe",
threshold:10,
velocity:.65,
direction:Ae | Ie,
pointers:1
},
getTouchAction:function() {
return Z.prototype.getTouchAction.call(this);
},
attrTest:function(t) {
var e, n = this.options.direction;
return n & (Ae | Ie) ? e = t.velocity :n & Ae ? e = t.velocityX :n & Ie && (e = t.velocityY), 
this._super.attrTest.call(this, t) && n & t.direction && t.distance > this.options.threshold && he(e) > this.options.velocity && t.eventType & Ye;
},
emit:function(t) {
var e = V(t.direction);
e && this.manager.emit(this.options.event + e, t), this.manager.emit(this.options.event, t);
}
}), l(ie, G, {
defaults:{
event:"tap",
pointers:1,
taps:1,
interval:300,
time:250,
threshold:2,
posThreshold:10
},
getTouchAction:function() {
return [ tn ];
},
process:function(t) {
var e = this.options, n = t.pointers.length === e.pointers, i = t.distance < e.threshold, s = t.deltaTime < e.time;
if (this.reset(), t.eventType & ke && 0 === this.count) return this.failTimeout();
if (i && s && n) {
if (t.eventType != Ye) return this.failTimeout();
var a = this.pTime ? t.timeStamp - this.pTime < e.interval :!0, o = !this.pCenter || I(this.pCenter, t.center) < e.posThreshold;
this.pTime = t.timeStamp, this.pCenter = t.center, o && a ? this.count += 1 :this.count = 1, 
this._input = t;
var u = this.count % e.taps;
if (0 === u) return this.hasRequireFailures() ? (this._timer = r(function() {
this.state = ln, this.tryEmit();
}, e.interval, this), an) :ln;
}
return dn;
},
failTimeout:function() {
return this._timer = r(function() {
this.state = dn;
}, this.options.interval, this), dn;
},
reset:function() {
clearTimeout(this._timer);
},
emit:function() {
this.state == ln && (this._input.tapCount = this.count, this.manager.emit(this.options.event, this._input));
}
}), re.VERSION = "2.0.4", re.defaults = {
domEvents:!1,
touchAction:Ze,
enable:!0,
inputTarget:null,
inputClass:null,
preset:[ [ ee, {
enable:!1
} ], [ Q, {
enable:!1
}, [ "rotate" ] ], [ ne, {
direction:Ae
} ], [ Z, {
direction:Ae
}, [ "swipe" ] ], [ ie ], [ ie, {
event:"doubletap",
taps:2
}, [ "tap" ] ], [ te ] ],
cssProps:{
userSelect:"none",
touchSelect:"none",
touchCallout:"none",
contentZooming:"none",
userDrag:"none",
tapHighlightColor:"rgba(0,0,0,0)"
}
};
var hn = 1, fn = 2;
se.prototype = {
set:function(t) {
return o(this.options, t), t.touchAction && this.touchAction.update(), t.inputTarget && (this.input.destroy(), 
this.input.target = t.inputTarget, this.input.init()), this;
},
stop:function(t) {
this.session.stopped = t ? fn :hn;
},
recognize:function(t) {
var e = this.session;
if (!e.stopped) {
this.touchAction.preventDefaults(t);
var n, i = this.recognizers, r = e.curRecognizer;
(!r || r && r.state & ln) && (r = e.curRecognizer = null);
for (var s = 0; s < i.length; ) n = i[s], e.stopped === fn || r && n != r && !n.canRecognizeWith(r) ? n.reset() :n.recognize(t), 
!r && n.state & (an | on | un) && (r = e.curRecognizer = n), s++;
}
},
get:function(t) {
if (t instanceof G) return t;
for (var e = this.recognizers, n = 0; n < e.length; n++) if (e[n].options.event == t) return e[n];
return null;
},
add:function(t) {
if (s(t, "add", this)) return this;
var e = this.get(t.options.event);
return e && this.remove(e), this.recognizers.push(t), t.manager = this, this.touchAction.update(), 
t;
},
remove:function(t) {
if (s(t, "remove", this)) return this;
var e = this.recognizers;
return t = this.get(t), e.splice(v(e, t), 1), this.touchAction.update(), this;
},
on:function(t, e) {
var n = this.handlers;
return a(g(t), function(t) {
n[t] = n[t] || [], n[t].push(e);
}), this;
},
off:function(t, e) {
var n = this.handlers;
return a(g(t), function(t) {
e ? n[t].splice(v(n[t], e), 1) :delete n[t];
}), this;
},
emit:function(t, e) {
this.options.domEvents && oe(t, e);
var n = this.handlers[t] && this.handlers[t].slice();
if (n && n.length) {
e.type = t, e.preventDefault = function() {
e.srcEvent.preventDefault();
};
for (var i = 0; i < n.length; ) n[i](e), i++;
}
},
destroy:function() {
this.element && ae(this, !1), this.handlers = {}, this.session = {}, this.input.destroy(), 
this.element = null;
}
}, o(re, {
INPUT_START:ke,
INPUT_MOVE:Te,
INPUT_END:Ye,
INPUT_CANCEL:Ee,
STATE_POSSIBLE:sn,
STATE_BEGAN:an,
STATE_CHANGED:on,
STATE_ENDED:un,
STATE_RECOGNIZED:ln,
STATE_CANCELLED:cn,
STATE_FAILED:dn,
DIRECTION_NONE:De,
DIRECTION_LEFT:Se,
DIRECTION_RIGHT:xe,
DIRECTION_UP:Ce,
DIRECTION_DOWN:Oe,
DIRECTION_HORIZONTAL:Ae,
DIRECTION_VERTICAL:Ie,
DIRECTION_ALL:je,
Manager:se,
Input:k,
TouchAction:q,
TouchInput:R,
MouseInput:z,
PointerEventInput:F,
TouchMouseInput:U,
SingleTouchInput:N,
Recognizer:G,
AttrRecognizer:K,
Tap:ie,
Pan:Z,
Swipe:ne,
Pinch:Q,
Rotate:ee,
Press:te,
on:f,
off:m,
each:a,
merge:u,
extend:o,
inherit:l,
bindFn:c,
prefixed:b
}), typeof define == ce && define.amd ? define(function() {
return re;
}) :"undefined" != typeof module && module.exports ? module.exports = re :t[n] = re;
}(window, document, "Hammer");

var ProductFeatures = new Class({
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
var e = this.getActiveDotEl(), n = this.dot_els.indexOf(e), i = n + (2 === t.direction ? 1 :-1);
if (0 > i || i > this.dot_els.length - 1) return !1;
var r = this.dot_els[i].get("data-product-dot");
this.changeActiveProduct(r);
}.bind(this)), this.root_el.addEvent("click", function() {
var t = this.getActiveDotEl(), e = this.dot_els.indexOf(t), n = e + 1;
n > this.dot_els.length - 1 && (n = 0);
var i = this.dot_els[n].get("data-product-dot");
this.changeActiveProduct(i);
}.bind(this)));
},
changeActiveProduct:function(t) {
var e = this.getFeatureListElByName(t), n = this.getImageElByName(t), i = this.getActionElByName(t), r = this.getDotElByName(t);
this.feature_list_els.removeClass("active"), this.image_els.removeClass("active"), 
this.action_els.removeClass("active"), this.dot_els.removeClass("active"), e && e.addClass("active"), 
n && n.addClass("active"), i && i.addClass("active"), r && r.addClass("active");
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