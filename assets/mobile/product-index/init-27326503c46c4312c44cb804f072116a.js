var TrumanInt=new Class({Implements:Events,initialize:function(t){this.rootEl=t,this.colorPickerEl=this.rootEl.getElement(".color-picker"),this.colorEls=this.rootEl.getElements(".color-picker span"),this.imageEl=this.rootEl.getElement("img"),this.colors=[],_.each(this.colorEls,function(t){var e=t.get("data-color"),i=t.get("data-image"),r=(Asset.image(i),{color:e,url:i});this.colors.push(r)}.bind(this)),this.currentColor=this.colorPickerEl.get("data-start"),Hammer(this.rootEl,{drag:!1,swipe_velocity:.2}).on("swipe",function(t){_.include(["left","right"],t.gesture.direction)&&this.changeImage(t.gesture.direction)}.bind(this)),this.imageFade=new Fx.Tween(this.imageEl,{property:"opacity",duration:300,link:"chain"})},changeImage:function(t){var e,i=_.findWhere(this.colors,{color:this.currentColor}),r=_.indexOf(this.colors,i);"left"==t?(e=r+1,e>this.colors.length-1&&(e=0)):"right"==t&&(e=r-1,0>e&&(e=this.colors.length-1));var o=this.colors[e];this.imageFade.addEvent("complete",function(){this.imageEl.set("src",o.url),this.imageEl.set("alt",o.color),this.imageEl.fade("in")}.bind(this)),this.imageFade.start(0),this.currentColor=o.color}}),Harrys=Harrys||{};window.addEvent("domready",function(){var t=document.getElements(".product.truman");t&&(Harrys.trumans=[],_.each(t,function(t){var e=new TrumanInt(t);Harrys.trumans.push(e)}))});