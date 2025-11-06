class dropdownHelper {
    addDropdownOnChangeListener (dropdownBlockId,inputName) {
        let input = document.getElementById(inputName);
        let dropdown = document.getElementById(dropdownBlockId);
        dropdown.onchange = function(){
            input.value = input.value  + this.value;
            input.value = this.value;
        }
    }
}

