
    const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
    formStepHeader.classList.add("form-stepper-unfinished");
    formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
});
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + index + '"]');
    /**
     * Check if the element exist. If yes, then proceed.
     */
    if (formStepCircle) {
    /**
     * Mark the form step as completed.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
    formStepCircle.classList.add("form-stepper-completed");
}
}
};
    /**
    * Select all form navigation buttons, and loop through them.
    */
    document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});

    var selectedSkills = [];

    function addSkill() {
    var select = document.getElementById('skills');
    var selectedSkill = select.options[select.selectedIndex];
    var selectedSkillId = selectedSkill.value;
    var selectedSkillText = selectedSkill.text;

    if (selectedSkills.length < 3 && !selectedSkills.find(skill => skill.id === selectedSkillId)) {
    selectedSkills.push({id: selectedSkillId, text: selectedSkillText});
    document.getElementById('selected_skills').value = selectedSkills.map(skill => skill.text).join(', ');
    document.getElementById('hidden_selected_skills').value = selectedSkills.map(skill => skill.id).join(', ');

    if (selectedSkills.length === 3) {
    console.log('Selected Skills:', selectedSkills);
}
} else if (selectedSkills.find(skill => skill.id === selectedSkillId)) {
    alert("You have already selected this skill.");
} else {
    alert("You can only select up to 3 skills.");
}

    select.selectedIndex = 0;  // Reset the select box
}
