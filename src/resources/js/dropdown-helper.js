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

new dropdownHelper().addDropdownOnChangeListener('selectParagraphNumber', 'paragraph_number');
new dropdownHelper().addDropdownOnChangeListener('selectToParagraphNumber', 'to_paragraph_number');