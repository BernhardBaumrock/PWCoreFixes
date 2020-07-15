$(document).ready(function(e) {
  if(typeof ProcessWire.config.LanguageTabs == 'undefined') return;
  let lang = ProcessWire.config.LanguageTabs.activeTab;
  if(!lang) return;
  let $tabs = $('div.langTabs > ul');
  $.each($tabs, function(i, tab) {
    UIkit.tab(tab).show(lang);
  });
});
