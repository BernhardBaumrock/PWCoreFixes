$(document).ready(function(e) {
  let lang = ProcessWire.config.LanguageTabs.activeTab;
  if(!lang) return;
  let $tabs = $('div.langTabs > ul');
  $.each($tabs, function(i, tab) {
    UIkit.tab(tab).show(lang);
  });
});
