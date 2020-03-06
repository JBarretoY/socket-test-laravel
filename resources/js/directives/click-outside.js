export default {
	bind (el, binding) {
		/**
		* @description attatch an event listener to the component
		* and to the entire document
		*/
    	el._clickOutsideHandler = evt => {
      		if (!el.contains(evt.target) && binding.expression) {
 
      			/**
      			* @description validates if the argument received
      			* is a function, if it isnt, then console.log a warning
      			*/
      			if (typeof binding.value === 'function') {
	      			/**
	      			* @description this line executes the event in the component
	      			*/
	        		binding.value(evt)
      			} else {
      				console.warn('[v-click-outside] directive must receive a function as argument')
      			}
      		}
    	}
 
    	document.addEventListener('click', el._clickOutsideHandler)
  	},
  	unbind (el, binding) {
  		/**
  		* @description The event attatched to the component
  		* is used to remove the event to the document
  		*/
    	document.removeEventListener('click', el._clickOutsideHandler)
  	}
}