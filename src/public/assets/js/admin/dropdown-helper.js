class dropdownHelper {
    constructor(inputName,dropdownBlockId) {
        this.inputName = inputName;
        this.dropdownBlockId = dropdownBlockId;
    }

    addDropdownOnChangeListener () {
        let input = document.getElementById(this.inputName);
        let dropdown = document.getElementById(this.dropdownBlockId);
        dropdown.onchange = function(){
            input.value = input.value  + this.value;
            input.value = this.value;
        }
    }
}

