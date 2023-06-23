document.addEventListener('DOMContentLoaded', function() {
    
    const navLinks = document.querySelectorAll('.link');
    const activeLanguage = document.getElementById('language').value;    
   
        navLinks.forEach(navLink => {

            const language = navLink.getAttribute('data-language');

            if (language == activeLanguage) {
                navLink.classList.add('active');   
            }            

            navLink.addEventListener('click', function(event) {

                navLinks.forEach(link => {
                    link.classList.remove('active');
                });    

                //event.preventDefault();
                
                const tabId = this;
                tabId.classList.add('active');
                const language = tabId.getAttribute('data-language');     
                setLanguage(language);               
            });
        });

         // Définir la langue de l'input caché
        function setLanguage(language) {

            document.getElementById('language').value = language;

            const title = document.getElementById('title');
            const body = document.getElementById('body');

            if (title.id === 'title_create' && body.id === 'body_create') {                
                title.value = '';
                body.innerHTML = '';
            } else if (language === 'en') {
                title.value = "{{ $post->title_en }}";
                body.innerHTML = "{{ $post->body_en }}";
            } else if (language === 'fr') {
                title.value = "{{ $post->title_fr }}";
                body.innerHTML = "{{ $post->body_fr }}";
            }
        }

        var enTab = document.getElementById('en-tab');
        var frTab = document.getElementById('fr-tab');

        enTab.addEventListener('click', function(event) {
            setLanguage('en');
        });

        frTab.addEventListener('click', function(event) {
            setLanguage('fr');
        });
        
});
  
