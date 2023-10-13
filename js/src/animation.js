// Animation Handler -- checks if BODY children have been scrolled into view
function revealElements() {
    // Get all elements with the "has-animation" class
    const animatedElements = document.querySelectorAll(".has-animation");
  
    // Loop through each animated element
    for (let i = 0; i < animatedElements.length; i++) {
      const element = animatedElements[i];
  
      // Check if the element is partially in view
      const isPartiallyInView = isElementPartiallyInView(element);
      if (isPartiallyInView) {
        // If the element is partially in view, append the "has-been-revealed" class to it
        element.classList.add("has-been-revealed");
      }
    }
  }
  
  function isElementPartiallyInView(element) {
    // Get the element's bounding rect
    const boundingRect = element.getBoundingClientRect();
  
    // Check if the element is partially within the viewport
    return (
      boundingRect.top < (window.innerHeight || document.documentElement.clientHeight) &&
      boundingRect.bottom >= 0
    );
  }
  
// Run these checks on scroll and on page load
window.addEventListener("scroll", revealElements);
revealElements();

// Wrap buttons in <span> to support animated state
const buttons = document.querySelectorAll('.wp-block-button a');
buttons.forEach(button => {
  const span = document.createElement('span');
  span.textContent = button.textContent;
  button.textContent = '';
  button.appendChild(span);
});