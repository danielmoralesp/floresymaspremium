var CarouselInt = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.frameEl = this.rootEl.getElement(".frame"), this.slideEls = this.rootEl.getElements("li"), 
this.width = this.frameEl.getWidth() / this.slideEls.length, this.rootEl.addEvent("swipe", function(t) {
t.stop(), this.slide(t.direction);
}.bind(this)), this.slideFx = new Fx.Tween(this.frameEl, {
property:"margin-left",
duration:500,
chain:"ignore"
});
},
slide:function(t) {
var e, n = this.frameEl.getStyle("margin-left").toInt();
"left" == t ? e = -320 :"right" == t && (e = 320), this.slideFx.start(n + e);
},
copy:function(t) {
console.log(t);
}
}), TrumanInt = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.colorPickerEl = this.rootEl.getElement(".color-picker"), this.colorEls = this.rootEl.getElements(".color-picker span"), 
this.imageEl = this.rootEl.getElement("img"), this.colors = [], _.each(this.colorEls, function(t) {
var e = t.get("data-color"), n = t.get("data-image"), i = (Asset.image(n), {
color:e,
url:n
});
this.colors.push(i);
}.bind(this)), this.currentColor = this.colorPickerEl.get("data-start"), Hammer(this.rootEl, {
drag:!1,
swipe_velocity:.2
}).on("swipe", function(t) {
_.include([ "left", "right" ], t.gesture.direction) && this.changeImage(t.gesture.direction);
}.bind(this)), this.imageFade = new Fx.Tween(this.imageEl, {
property:"opacity",
duration:300,
link:"chain"
});
},
changeImage:function(t) {
var e, n = _.findWhere(this.colors, {
color:this.currentColor
}), i = _.indexOf(this.colors, n);
"left" == t ? (e = i + 1, e > this.colors.length - 1 && (e = 0)) :"right" == t && (e = i - 1, 
0 > e && (e = this.colors.length - 1));
var s = this.colors[e];
this.imageFade.addEvent("complete", function() {
this.imageEl.set("src", s.url), this.imageEl.set("alt", s.color), this.imageEl.fade("in");
}.bind(this)), this.imageFade.start(0), this.currentColor = s.color;
}
}), Harrys = Harrys || {};

window.addEvent("domready", function() {
var t = document.getElements(".product.truman");
t && (Harrys.trumans = [], _.each(t, function(t) {
var e = new TrumanInt(t);
Harrys.trumans.push(e);
}));
});