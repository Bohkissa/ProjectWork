// Set --primary color based on ?page=sostenibilita&cap=... mapping
(function(){
  try{
    var params = new URLSearchParams(window.location.search);
    var page = params.get('page');
    if(!page) return;
    var map = {
      'sostenibilita-assetto-societario':'#a74016',
      'sostenibilita-i-nostri-mercati':'#ff725d',
      'sostenibilita-percorso-di-sostenibilita':'#9aa2b8',
      'sostenibilita-filiera-di-qualita':'#57c293',
      'sostenibilita-le-nostre-persone':'#80ba55',
      'sostenibilita-tutela-ambiente':'#2e7f3e',
      'sostenibilita-valore-economico':'#3e5883',
      'sostenibilita-allegati':'#ab7743'
    };
    var color = map[page];
    if(color){
      document.documentElement.style.setProperty('--primary', color);
    }
  }catch(e){console.error(e)}
})();
