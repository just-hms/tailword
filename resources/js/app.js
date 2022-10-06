function toggles() {

	// nav toggle

	let main_navigation = document.querySelector('#primary-menu');
	
	document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
		e.preventDefault();
		main_navigation.classList.toggle('hidden');
	});

	let menu_parents = this.document.getElementsByClassName("menu-item-has-children"); 
	let submenus = document.getElementsByClassName('sub-menu');

	Array.from(menu_parents).forEach(parent_voice => {
		
		let submenu = parent_voice.getElementsByClassName('sub-menu')[0];
		let link = parent_voice.getElementsByTagName('div')[0];
		
		if (!submenu || !link) return;

		link.onclick = e => {

			
			let is_sub_menu_open = !submenu.classList.contains('hidden'); 
	
			Array.from(submenus).forEach(sub_voice => {
				sub_voice.classList.add('hidden');
			});

			if (is_sub_menu_open){
				submenu.classList.add('hidden');
				return;
			}

			submenu.classList.remove('hidden');
		};

	});

	// close everthing besides the things that are toggled 

	document.onclick = e => {
		
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

window.addEventListener('load', function() {
	toggles();
});