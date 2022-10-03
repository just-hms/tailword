
// toggles 

function toggles() {

	let main_navigation = document.querySelector('#primary-menu');
	document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
		e.preventDefault();
		main_navigation.classList.toggle('hidden');
	});

	let menu_parents = this.document.getElementsByClassName("menu-item-has-children"); 
	let submenus = document.getElementsByClassName('sub-menu');

	Array.from(menu_parents).forEach(parent_voice => {
		
		let submenu = parent_voice.getElementsByClassName('sub-menu')[0];
		let link = parent_voice.getElementsByTagName('a')[0];
		
		if (!submenu || !link) return;

		link.onclick = () => {
			
			let is_sub_menu_open = !submenu.classList.contains('hidden'); 
	
			Array.from(submenus).forEach(sub_voice => {
				sub_voice.classList.add('hidden');
			});

			if (is_sub_menu_open){
				submenu.classList.add('hidden');
				return;
			}

			submenu.classList.remove('hidden');
			submenu.style.left = parent_voice.offsetWidth / 2 -  submenu.offsetWidth / 2 + "px";
		};

	});

	// drop btn
	let info_drop_btn = document.getElementById("info_drop_btn");
	let info_menu = document.getElementById("info_dropdown");

	if (info_drop_btn && info_menu){

		info_drop_btn.onclick = () => {
			info_menu.classList.toggle("hidden");
		}

	}
	
	// close everthing besides the things that are toggled 

	document.onclick = e => {
		
		if(!e.target.closest('#info_drop_btn'))
			info_menu.classList.add("hidden");

		if (!e.target.closest('.menu-item-has-children')){
			
			let submenus = document.getElementsByClassName('sub-menu');

			Array.from(submenus).forEach(el => {
				if (!el.classList.contains('static'))
					el.classList.add('hidden');
			});
			
		}

		if (!e.target.closest('#primary-menu-toggle') && !e.target.closest('#primary-menu'))
			document.getElementById('primary-menu').classList.add('hidden')
	}
}


// dark mode
function darkMode() {

    let themeToggleDarkIcon = document.getElementsByClassName('theme-toggle-dark-icon');
    let themeToggleLightIcon = document.getElementsByClassName('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        
        Array.from(themeToggleLightIcon).forEach(el => {
            el.classList.remove('hidden');
            document.getElementsByTagName('html')[0].classList.add('dark');
        });
        
    } else {
        Array.from(themeToggleDarkIcon).forEach(el => {
            el.classList.remove('hidden');
        });
    }

    let themeToggleBtn = document.getElementsByClassName('theme-toggle');

    Array.from(themeToggleBtn).forEach(el => {

        el.addEventListener('click', function() {
        
            // toggle icons inside button
            Array.from(themeToggleDarkIcon).forEach(el => el.classList.toggle('hidden'));
            Array.from(themeToggleLightIcon).forEach(el => el.classList.toggle('hidden'));
        
            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
        
            // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
            
        });
    })

};


window.addEventListener('load', function() {
	toggles();
	darkMode();
});