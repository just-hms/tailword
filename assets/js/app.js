window.onload = () => {
	
	const toggle = document.getElementById('primary-menu-toggle');
	const menu = document.getElementById('primary-menu');
	
	if (!toggle || !menu) return;

	toggle.onclick = () => {
		menu.classList.remove('hidden');
		menu.classList.add('block');
	}
}