function init(){function t(){var t=r.indexOf(e);t>0&&_.times(t,function(t){r[t].setComplete()}),e.open()}var e,i='[data-drawer="faq"]',n='[data-action="faq"]',o="[data-section]",s=(_.map($$("[data-scroll-to]"),function(t){var e=t.get("data-scroll-to"),i=$$('[data-scroll-here="'+e+'"]')[0],n=new Fx.Scroll(window);t.addEvent("click",function(){n.toElement(i)})}),_.map($$(i),function(t){var e=new Drawer(t);return e.addEvent("change",function(t){"open"===t?(_.each(a,function(t){t.addClass("open")}),Harrys.analytics.trackEvent({eventAction:"FAQ Section Change",eventCategory:"Subscription",eventLabel:"Open"})):(_.each(a,function(t){t.removeClass("open")}),Harrys.analytics.trackEvent({eventAction:"FAQ Section Change",eventCategory:"Subscription",eventLabel:"Close"}))}),e})),a=_.map($$(n),function(t){return t.addEvent("click",function(){_.each(s,function(t){t.toggle()})}),t}),r=_.map($$(o),function(t,e){var i=t.get("data-section"),n=new window["Accordion"+i+"Section"](t);return n.addEvents({change:function(t){if("truman-set"!==n.name)return!1;var e=n.root_el.getElement(".content .image img"),i=n.root_el.getElement('[data-field="value"]');e.set("src",t.data.big_image),i.set("text",t.data.value)},complete:function(t){var i=_.where(r,{type:"trial-review"});_.each(i,function(e){e.setData(n.name,t.data)});var o=r[e+1];o&&(n.close(),o.open())},open:function(){_.each(r,function(t,i){i>e&&t.unsetComplete(),i===e+1?t.setNext():i>e+1&&t.unsetNext(),t!==n&&t.close()})},close:function(){},next_open:function(){var t=r[e-1];t&&t.setComplete()}}),n}),l=new URI(document.location).get("data");e=l.start?_.findWhere(r,{name:l.start}):r[0],e.complete?t():e.addEvent("load",t),_.each($$('[data-scroll-to="builder"]'),function(t){var e=t.get("section-name");t.addEvent("click",function(){Harrys.analytics.trackClick({eventCategory:"Subscription",eventLabel:"Scroll to Builder from Section "+e})})})}var AccordionSection=new Class({Implements:[Events,Options],options:{next_button_selector:".content button",closed_padding:20,complete_hover_height:55,beforeOpen:function(t){t()},beforeClose:function(t){t()}},initialize:function(t,e){this.setOptions(e),this.root_el=t,this.name=this.root_el.get("data-name"),this.start="true"===this.root_el.get("data-start"),this.next_button=this._setupNextButton(this.options.next_button_selector),this.options.closed_height=this.root_el.getElement(".header").getSize().y,this.overlay_els=this.root_el.getElements(".overlay"),async.each(this.root_el.getElements("img"),function(t,e){t.set("src",t.get("src")),t.complete?e():t.addEvent("load",function(){t.removeEvents("load"),e()})},function(){this.complete=!0,this.fireEvent("load")}.bind(this))},_setupNextButton:function(t){var e=this.root_el.getElement(t),i=new Button(e);return i.addEvent("click",function(t){t.stopPropagation(),this.isValid()&&(Harrys.analytics.trackClick({eventCategory:"Subscription",eventLabel:this.name+" Section Complete"}),this.setComplete())}.bind(this)),i},isValid:function(){return!0},isComplete:function(){return this.root_el.hasClass("complete")},setComplete:function(){return this.root_el.addClass("complete").addEvents({click:function(){this.unsetComplete().open()}.bind(this),mouseover:this.sneakPeek.bind(this),mouseout:this.close.bind(this)}),this.fireEvent("complete",this.getValue()),this},unsetComplete:function(){return this.root_el.removeClass("complete").removeEvents(),this.fireEvent("uncomplete"),this},setNext:function(){this.root_el.addClass("next").addEvent("click",function(){this.fireEvent("next_open")}.bind(this))},unsetNext:function(){this.root_el.removeClass("next").removeEvents()},measureHeight:function(){var t=2*this.options.closed_padding;return this.root_el.measure(function(){var e=this.getHeight();this.setStyles({transition:"none",height:"auto"});var i=this.getSize().y-t;return this.setStyles({transition:"",height:e-t}),i})},scrollToRoot:function(){this.win_scroll=this.win_scroll||new Fx.Scroll(window,{offset:{x:0,y:-50},link:"chain",wheelStops:!0}),this.win_scroll.toElement(this.root_el)},scrollToTop:function(){this.win_scroll=this.win_scroll||new Fx.Scroll(window,{offset:{x:0,y:-50},link:"chain",wheelStops:!0}),this.win_scroll.toTop()},open:function(){return this.options.beforeOpen(function(){this.root_el.removeClass("closed").setStyles({height:this.measureHeight()}),this.unsetNext(),Harrys.IS_MOBILE&&setTimeout(this.scrollToTop.bind(this),500),this.fireEvent("open"),_.each(this.overlay_els,function(t){t.fade("in")})}.bind(this)),this},close:function(){return this.options.beforeClose(function(){this.root_el.addClass("closed").setStyles({height:this.options.closed_height}),_.each(this.overlay_els,function(t){t.fade("out")}),this.fireEvent("close")}.bind(this)),this},sneakPeek:function(){Browser.ie8||Browser.ie9||this.root_el.setStyle("height",this.options.complete_hover_height)}}),AccordionInputSection=new Class({Extends:AccordionSection,options:{choice_el_selector:".options .option",default_choice:null},initialize:function(t,e){this.type="input",this.setOptions(e),this.parent(t,this.options),this.swipeable="true"===this.root_el.get("data-swipeable"),this.swipeable&&(this.frame_el=this.root_el.getElement(".swipe-frame"),this.options_el=this.root_el.getElement(".options"),this.options_width=this.options_el.getSize().x,this.hammer=new Hammer(this.options_el,{velocity:.01}),this.hammer.on("swipe",function(t){var e=this.getActiveChoice(),i=this.choices.indexOf(e),n=i+(2===t.direction?1:-1);if(0>n||n>this.choices.length-1)return!1;var o=this.choices[n];this.changeChoice(o)}.bind(this))),this.choices=this._setupChoices(this.options.choice_el_selector),this.dot_els=this.root_el.getElements(".dot[data-value]"),this.detail_els=this.root_el.getElements(".detail[data-value]"),this.complete_headline=this.root_el.getElement(".complete-headline"),this.incomplete_headline=this.root_el.getElement(".incomplete-headline");var i=new URI(document.location).get("data")||{},n=this.options.default_choice||i[this.name]||this.root_el.get("data-default-value");n&&this.changeChoiceByValue(n),this.addEvents({complete:this.updateHeadline.bind(this),uncomplete:this.updateHeadline.bind(this),open:function(){this.swipeable&&this.centerActiveChoice(this.getActiveChoice())}.bind(this)})},_setupChoices:function(t){var e=_.map(this.root_el.getElements(t),function(t){var e={el:t,value:t.get("data-value"),active:!1};return e.data=_.findWhere(ACCORDION_DATA[this.name],{value:e.value}),e.el.getElement(".action").addEvent("click",function(){this.changeChoice(e)}.bind(this)),e}.bind(this));return e},updateHeadline:function(){if(this.isComplete()){var t=this.getActiveChoice().data;_.each(t,function(t,e){var i=this.complete_headline.getElement("[data-name='"+e+"']");i&&i.set("text",t.toString().replace("<br>",""))}.bind(this)),this.complete_headline.addClass("active"),this.incomplete_headline.removeClass("active")}else this.incomplete_headline.addClass("active"),this.complete_headline.removeClass("active")},getActiveChoice:function(){return _.findWhere(this.choices,{active:!0})},getChoiceByValue:function(t){return _.findWhere(this.choices,{value:t})},getDotElByValue:function(t){return _.find(this.dot_els,function(e){return e.get("data-value")===t})},getDetailElsByValue:function(t){return _.filter(this.detail_els,function(e){return e.get("data-value")===t})},getValue:function(){var t=this.getActiveChoice();return t?t:void 0},changeChoice:function(t){_.each(this.choices,function(t){t.el.removeClass("active"),t.active=!1}),t.el.addClass("active"),t.active=!0,this.swipeable&&this.centerActiveChoice(t);var e=this.getDotElByValue(t.value);e&&(_.each(this.dot_els,function(t){t.removeClass("active")}),e.addClass("active"));var i=this.getDetailElsByValue(t.value);return i&&(_.each(this.detail_els,function(t){t.removeClass("active")}),_.each(i,function(t){t.addClass("active")})),this.fireEvent("change",t),this},changeChoiceByValue:function(t){var e=this.getChoiceByValue(t);return this.changeChoice(e),this},centerActiveChoice:function(t){var e=t.el.getSize().x,i=t.el.getPosition(this.frame_el).x,n=this.options_width/2-e/2,o=n-i;this.frame_el.setStyle("left",o)},isValid:function(){return!!this.getValue()}}),AccordionReviewSection=new Class({Extends:AccordionSection,options:{tbody_selector:".content .table .tbody",today_total_selector:".today .total",recurring_total_selector:".recurring .total",interval_selector:".recurring .interval",saving_selector:".today .saving",save_amount_selector:".today .save-amount",new_saving_selector:".saving",new_save_amount_selector:".saving .save-amount",guaranteed_blurb_mobile:".guaranteed-blurb"},data:{},VALID_DATA_KEYS:["timing","bundle","handle"],desktopTableRowTemplate:_.template('<tr>         <td class="image">             <img src="<%= image %>">         </td>         <td class="item">             <p class="name">                 <%= name %>             </p>             <p class="more-info">                 <% _.each(more_info, function (e) { %>                     <%= e %><br>                 <% }); %>             </p>         </td>         <td class="frequency">             <%= frequency %>         </td>         <td class="month-price">             <%= month_price %>         </td>         <td class="ship-price">             <%= ship_price %>         </td>     </tr>'),mobileTableRowTemplate:_.template('<div class="item">         <div class="grid image-info">             <div class="col-1-4 image">                 <img src="<%= image %>">             </div>             <div class="col-3-4 text">                 <p class="name"><%= name %></p>                 <p class="more-info">                     <% _.each(more_info, function (e) { %>                         <%= e %><br>                     <% }); %>                 </p>             </div>         </div>         <div class="grid">             <p class="col-1-2 label">Frequency</p>             <p class="col-1-2 value"><%= frequency %></p>         </div>         <div class="grid">             <p class="col-1-2 label">Price / Month</p>             <p class="col-1-2 value"><%= month_price %></p>         </div>         <div class="grid">             <p class="col-1-2 label">Price / Shipment</p>             <p class="col-1-2 value"><%= ship_price %></p>         </div>     </div>'),initialize:function(t,e){this.type="review",this.options.beforeOpen=function(t){this.updateTable(this.cleanDataForTemplate(this.data)),async.each(this.root_el.getElements("img"),function(t,e){t.complete?e():t.addEvent("load",function(){t.removeEvents("load"),e()})},t)}.bind(this),this.options.beforeClose=function(t){this.new_review_section&&this.new_guaranteed_blurb_el&&this.new_guaranteed_blurb_el.hide(),t()}.bind(this),this.setOptions(e),this.parent(t,this.options),this.tbody_el=this.root_el.getElement(this.options.tbody_selector),this.today_total_el=this.root_el.getElement(this.options.today_total_selector),this.recurring_total_el=this.root_el.getElement(this.options.recurring_total_selector)||$$(this.options.recurring_total_selector),this.interval_el=this.root_el.getElement(this.options.interval_selector)||$$(this.options.interval_selector),this.saving_el=this.root_el.getElement(this.options.saving_selector),this.save_amount_el=this.root_el.getElement(this.options.save_amount_selector),this.new_saving_el=this.root_el.getElement(this.options.new_saving_selector),this.new_save_amount_el=this.root_el.getElement(this.options.new_save_amount_selector),this.new_guaranteed_blurb_el=$$(this.options.guaranteed_blurb_mobile),this.new_review_section=!this.saving_el},setData:function(t,e){this.data[t]=e},updateTable:function(t){this.tbody_el.empty(),_.each(t.line_items,function(t){var e=Harrys.IS_MOBILE?this.mobileTableRowTemplate(t):this.desktopTableRowTemplate(t),i=Elements.from(e)[0];this.tbody_el.adopt(i)}.bind(this)),this.today_total_el.set("text",this.new_review_section?"$"+t.month_total.toFloat().toFixed(2):"$"+t.month_total),this.recurring_total_el.set("text","$"+t.month_total),this.interval_el.set("text",t.interval);var e=this.saving_el||this.new_saving_el;0===t.saving?e.hide():e.show(),this.new_review_section?(this.new_guaranteed_blurb_el&&this.new_guaranteed_blurb_el.show(),0===t.bundle_saving?this.new_save_amount_el.getParent().hide():this.new_save_amount_el.getParent().show(),this.new_save_amount_el.set("text","$"+t.bundle_saving.toFloat().toFixed(2))):this.save_amount_el.set("text","$"+t.saving)},cleanDataForTemplate:function(t){var e=this.getLineItems(t),i={interval:this.getInterval(t),line_items:e,month_total:this.getMonthTotal(e),saving:this.getSavingAmount(e),bundle_saving:this.getBundleSavingAmount(e)};return i},getFrequency:function(t){var e;if(t.timing&&(e=t.timing.interval),t.custom&&(e=t.custom.interval/30),e){var i="Every "+e+" Month";return 1!==e&&(i+="s"),i}},getMonthPrice:function(t){var e=this.getCost(t);return e?"$"+e.toFloat().toFixed(2):void 0},getShipPrice:function(t){return t.bundle?"$"+t.bundle.cost.toFloat().toFixed(2):void 0},getCost:function(t){return t.bundle&&t.timing?t.bundle.cost/t.timing.interval:void 0},getMonthTotal:function(t){return _.reduce(t,function(t,e){return t+=e.price*e.quantity},0)},getInterval:function(t){return t.timing?t.timing.interval:t.custom?t.custom.interval/30:void 0},getSavingAmount:function(t){var e=this.getMonthTotal(t),i=_.reduce(t,function(t,e){var i=e.non_bundle_price||e.price;return t+=i*e.quantity},0);return i-e},getBundleSavingAmount:function(t){var e=this.getMonthTotal(t),i=_.reduce(t,function(t,e){if("Once"!==e.frequency){var i=e.non_bundle_price||e.price;return t+=i*e.quantity}return t},0);return i-e},getLineItems:function(t){var e=[];return t.handle&&e.push({image:t.handle.image,name:"Truman Razor Handle",more_info:[t.handle.value],price:0,non_bundle_price:10,frequency:"Once",month_price:this.new_review_section?"-":"Free",ship_price:"Free",quantity:1}),t["truman-set"]&&e.push({image:t["truman-set"].image,name:"Your Trial",more_info:t["truman-set"].value,price:0,non_bundle_price:15,frequency:"Once",month_price:"Free",ship_price:3,quantity:1}),t.bundle&&e.push({image:t.bundle.image,name:t.bundle.title,more_info:t.bundle.includes,price:t.bundle.cost,non_bundle_price:t.bundle.non_bundle_cost||t.bundle.cost,frequency:this.getFrequency(t),month_price:this.getMonthPrice(t),ship_price:this.getShipPrice(t),quantity:1}),t.custom&&(e=_.reduce(t.custom,function(e,i,n){if(0===i)return e;var o="make"+n.capitalize()+"LineItem",s=this[o]&&this[o](i);return s&&(s.frequency=this.getFrequency(t),s.month_price=s.ship_price/(t.custom.interval/30),s.ship_price="$"+s.ship_price.toFloat().toFixed(2),s.month_price="$"+s.month_price.toFloat().toFixed(2),e.push(s)),e}.bind(this),e)),e},makeBladesLineItem:function(t){var e=Harrys.productsManager.findByPackSize(t);return{image:e.checkout_image,name:e.name,more_info:[e.pack_size+" Pack"],price:e.price,frequency:null,month_price:null,ship_price:e.price,quantity:1}},makeCreamLineItem:function(t){var e=Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE),i=e.price*t;return{image:e.checkout_image,name:e.name,more_info:[e.tube_size],price:e.price,frequency:null,month_price:null,ship_price:i,quantity:t}},makeGelLineItem:function(t){var e=Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_GEL_FOUR_OZ),i=e.price*t;return{image:e.checkout_image,name:e.name,more_info:[e.tube_size],price:e.price,frequency:null,month_price:null,ship_price:i,quantity:t}},makeAftershaveLineItem:function(t){var e=Harrys.productsManager.findByUid(Harrys.productIds.PACKAGED_AFTER_SHAVE_ONE_OZ),i=e.price*t;return{image:e.checkout_image,name:e.name,more_info:[e.tube_size],price:e.price,frequency:null,month_price:null,ship_price:i,quantity:t}},setComplete:function(){this.next_button.disable(),Harrys.cart.clear(),this.data.custom&&this.addCustomItemsToCart(this.data.custom),this.data.timing&&this.data.bundle&&this.addBundleItemsToCart(this.data),this.data.handle&&Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid(this.data.handle.uid).id,quantity:1}),{no_show_mini_cart:!0}),this.data["truman-set"]&&(Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findById(this.data["truman-set"].uid.toInt()).id,quantity:1}),{no_show_mini_cart:!0}),Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid("KKRB0098").id,quantity:1,customizations:{interval:30*this.getInterval(this.data),first_send_date:moment().add(30,"days").format("YYYY-MM-DD")}}),{no_show_mini_cart:!0})),window.location="/checkout"},addCustomItemsToCart:function(t){console.log(t);var e={no_show_mini_cart:!0};t.blades>0&&Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByPackSize(t.blades).id,quantity:1,customizations:{interval:t.interval}}),e),t.cream>0&&Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_CREAM_THREE_OZ_BLUE).id,quantity:t.cream,customizations:{interval:t.interval}}),e),t.gel>0&&Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid(Harrys.productIds.SHAVE_GEL_FOUR_OZ).id,quantity:t.gel,customizations:{interval:t.interval}}),e),t.aftershave>0&&Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid(Harrys.productIds.PACKAGED_AFTER_SHAVE_ONE_OZ).id,quantity:t.aftershave,customizations:{interval:t.interval}}),e)},addBundleItemsToCart:function(t){var e={no_show_mini_cart:!0},i=30*this.getInterval(this.data);Harrys.cart.addItem(new CartItem({id:Harrys.productsManager.findByUid(t.bundle.uid).id,quantity:1,customizations:{interval:i}}),e)}}),AccordionTrialReviewSection=new Class({Extends:AccordionReviewSection,options:{trial_image_selector:'[data-image="trial"]',color_field_selector:'[data-field="color"]',month_cost_field_selector:'[data-field="month_cost"]',interval_field_selector:'[data-field="interval"]'},initialize:function(t,e){this.parent(t,e),this.type="trial-review",this.trial_image_el=this.root_el.getElement(this.options.trial_image_selector),this.color_els=this.root_el.getElements(this.options.color_field_selector),this.month_cost_els=this.root_el.getElements(this.options.month_cost_field_selector),this.interval_els=this.root_el.getElements(this.options.interval_field_selector)},updateTable:function(t){var e=_.findWhere(t.line_items,{name:"Your Trial"});this.trial_image_el.set("src",e.image),_.each(this.color_els,function(t){t.set("text",e.more_info)});var i=30;_.each(this.interval_els,function(e){e.set("text",t.interval)}),_.each(this.month_cost_els,function(e){e.set("text",i/t.interval)})}}),Drawer=new Class({Implements:[Events,Options],OPEN_STATE:"open",CLOSED_STATE:"closed",options:{},initialize:function(t,e){this.setOptions(e),this.root_el=t,this.height=this.root_el.measure(function(){this.setStyle("height","auto");var t=this.getHeight();return this.setStyle("height",0),t}).toInt(),this.state=this.CLOSED_STATE},toggle:function(){var t=this.state===this.OPEN_STATE?"close":"open";this[t]()},open:function(){this.root_el.setStyle("height",this.height),this.state=this.OPEN_STATE,this.fireEvent("change",this.state)},close:function(){this.root_el.setStyle("height",0),this.state=this.CLOSED_STATE,this.fireEvent("change",this.state)}});window.addEvent("domready",init);