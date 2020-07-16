$(document).ready(function(e) {
  let initTabs = function() {
    if(typeof ProcessWire.config.LanguageTabs == 'undefined') return;
    let lang = ProcessWire.config.LanguageTabs.activeTab;
    if(!lang) return;
    let $tabs = $('div.langTabs > ul');
    $.each($tabs, function(i, tab) {
      UIkit.tab(tab).show(lang);
    });
  }

  // init tabs on page load
  initTabs();

  // init tabs after ajax requests (eg repeater fields)
  $(document).ajaxComplete(initTabs);
});
