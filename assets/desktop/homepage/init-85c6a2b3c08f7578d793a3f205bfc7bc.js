window.addEvent("domready", function() {
_.each($$(".color-picker"), function(t) {
var e = t.getElement(".product-shot"), i = t.getElements(".colors span");
i.addEvent("mouseover", function() {
var t = (this.get("class"), this.get("data-preload-image"));
e.get("src") !== t && e.set("src", t);
});
});
});