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
}

function getRowId(button) {
	var row = button.parentNode.parentNode; 
	var id = row.cells[0].textContent;
	var name = row.cells[1].textContent;
	var email = row.cells[2].textContent;
	document.getElementById("editProfileId").value = id;
	document.getElementById("deleteProfileId").value = id;
	document.getElementById("editProfileIdText").textContent  = id;
	document.getElementById("editProfileName").value = name;
	document.getElementById("editProfileNameText").textContent = name;
	document.getElementById("editProfileEmail").value = email;
	document.getElementById("editProfileEmailText").textContent = email;
  }