(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['photoCard'] = template({"compiler":[7,">= 4.0.0"],"main":function(container,depth0,helpers,partials,data) {
    var helper, alias1=depth0 != null ? depth0 : (container.nullContext || {}), alias2=helpers.helperMissing, alias3="function", alias4=container.escapeExpression;

  return "<section class=\"photo-card\">\r\n  <div class=\"img-container\">\r\n    "
    + alias4(((helper = (helper = helpers.exercise || (depth0 != null ? depth0.exercise : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"exercise","hash":{},"data":data}) : helper)))
    + "\r\n  </div>\r\n  <div class=\"caption\">\r\n    "
    + alias4(((helper = (helper = helpers.weight || (depth0 != null ? depth0.weight : depth0)) != null ? helper : alias2),(typeof helper === alias3 ? helper.call(alias1,{"name":"weight","hash":{},"data":data}) : helper)))
    + "\r\n  </div>\r\n</section>\r\n";
},"useData":true});
})();