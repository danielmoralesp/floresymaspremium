var ProductInt = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.removeEl = this.rootEl.getElement(".remove"), this.quantityEl = this.rootEl.getElement(".quantity") ? this.rootEl.getElement(".quantity").getElement("input") :null, 
this.autoReplaceEl = this.rootEl.getElement(".auto-replace"), this.intervalEl = this.rootEl.getElement(".interval"), 
this.intervalSectionEl = this.rootEl.getElement(".interval-section"), this.totalEl = this.rootEl.getElement(".total-price"), 
this.key = this.rootEl.get("data-key"), this.removeEl && (new QuickTap(this.removeEl), 
this.removeEl.addEvent("click", function() {
this.remove();
}.bind(this))), this.quantityEl && (this.quantityInput = new QuantityInput(this.quantityEl), 
this.quantityInput.addEvents({
change:function(t) {
return 1 > t ? (this.quantityEl.set("value", 1), void 0) :(this.quantity = t, this.setQuantity(t), 
void 0);
}.bind(this)
}));
},
remove:function() {
Harrys.cart.setQuantity(this.key, 0);
},
setQuantity:function(t) {
Harrys.cart.setQuantity(this.key, t);
},
setTotalPrice:function(t, e) {
var n = t * e;
this.totalEl.set("text", "$" + n);
},
getId:function() {
return this.rootEl.get("data-id");
},
getQuantity:function() {
return this.quantityEl.get("value");
},
getEngraving:function() {
return this.rootEl.get("data-engraving");
},
hide:function() {
this.rootEl.setStyle("display", "none");
},
show:function() {
this.rootEl.setStyle("display", "block");
}
}), CartInt = new Class({
Implements:Events,
initialize:function(t) {
this.rootEl = t, this.emptyEl = this.rootEl.getElement(".empty"), this.subtotalEl = $("subtotal"), 
this.productEls = this.rootEl.getElements(".product"), this.discountEl = this.rootEl.getElement("#discount"), 
this.ProductInts = [], _.each(this.productEls, function(t) {
this.ProductInts.push(new ProductInt(t));
}.bind(this));
},
findCartIntByKey:function(t) {
return _.find(this.ProductInts, function(e) {
return e.key === t;
});
},
updateSubtotal:function() {
this.discountEl && window.location.reload();
var t = "$" + Harrys.cart.getSubtotal().toInt();
this.subtotalEl.set("text", t);
}
}), Harrys = Harrys || {};

window.addEvent("domready", function() {
Harrys.analytics.trackCheckoutSection("Cart");
var t, e = window.location.hash;
e.contains("item_added") && (t = e.split("=")[1].replace("_", " "), window.location.hash = "", 
new Flash(I18n.t("CartInit.added_to_cart", {
product:t
}), "notice"));
var n = $("cart");
Harrys.cartInt = new CartInt(n), Harrys.cart.addEvents({
item_removed:function(t) {
Harrys.cartInt.findCartIntByKey(t.key).hide(), Harrys.cartInt.updateSubtotal();
},
item_changed:function(t) {
var e = Harrys.cartInt.findCartIntByKey(t.key);
e.setTotalPrice(t.product.price, t.quantity), Harrys.cartInt.updateSubtotal();
}
});
});