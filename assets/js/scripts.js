(function ($) {
    $(document).ready(function () {
        let currentColorPicker = {} // Holds the current input.
        const colorInputs = $('.js-color-picker-toggle')
        const colorPickerBox = $('.js-color-picker-box')
        const colorPicker = new iro.ColorPicker('.js-color-picker')

        colorPicker.on('color:change', function (color) {
            currentColorPicker.css("background-color", color.hexString);
            currentColorPicker.val(color.hexString);
            currentColorPicker.closest('tr').find('.js-color-picker-rgb').val(color.rgbString);
            currentColorPicker.closest('tr').find('.js-color-picker-hsl').val(color.hslString);
        })

        colorInputs.on('focus', function () {
            colorPickerBox.addClass('is-open')
            currentColorPicker = $(this)
            const currentColorPickerPos = currentColorPicker.offset()

            console.log(currentColorPickerPos)

            colorPickerBox.css("top", currentColorPickerPos.top);
            colorPickerBox.css("left", currentColorPickerPos.left);
        })

        colorInputs.on('blur', function () {
            colorPickerBox.removeClass('is-open')
        })
    })
})(jQuery)