/* global bootstrap: false */
(() => {
  'use strict'
  const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.forEach(tooltipTriggerEl => {
    new bootstrap.Tooltip(tooltipTriggerEl)
  })
})()

function verView() {
	var selectValue = document.getElementById("VersionSelect").value;
	window.location.href = selectValue;
	// document.getElementById("selectVersion").value = selectValue;
}
  