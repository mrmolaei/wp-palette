(function ($) {
    $(document).ready(function () {
        let currentColorPicker = {} // Holds the current input.
        const colorInputs = $('.js-color-picker-toggle')
        const colorPickerBox = $('.js-color-picker-box')
        const colorPicker = new iro.ColorPicker('.js-color-picker')
        const addColorBtn = $('.js-add-color')
        const removeBtns = $('.js-remove-color')

        // Handle color change
        colorPicker.on('color:change', function (color) {
            currentColorPicker.css("background-color", color.hexString);
            currentColorPicker.val(color.hexString);
            currentColorPicker.closest('tr').find('.js-color-picker-rgb').val(color.rgbString);
            currentColorPicker.closest('tr').find('.js-color-picker-hsl').val(color.hslString);
        })

        // Open color picker when the color inputs have focus
        colorInputs.on('focus', function () {
            colorPickerBox.addClass('is-open')
            currentColorPicker = $(this)
            const currentColorPickerPos = currentColorPicker.offset()

            console.log(currentColorPickerPos)

            colorPickerBox.css("top", currentColorPickerPos.top);
            colorPickerBox.css("left", currentColorPickerPos.left - 180);
        })

        // Close color picker when color inputs lost focus
        colorInputs.on('blur', function () {
            colorPickerBox .removeClass('is-open')
        })

        // Add new row to colors table
        addColorBtn.on('click', function (e) {
            e.preventDefault()
            const tableBody = $('.js-colors-table-body')
            const colorsCount = parseInt(tableBody.find('tr:last-child').attr('data-tr-id'))
            const newColor = `
                <tr data-tr-id="${colorsCount + 1}">
                        <td>
                            <button class="c-btn c-btn--remove js-remove-color">
                                <span class="dashicons dashicons-no-alt"></span>
                            </button>
                            <input class="c-color-name-input" name="wp_palette_data[colors][${colorsCount + 1}][name]"
                                   value="${wpPaletteObj['color_name_str']}">
                        </td>
                        <td>
                            <input name="wp_palette_data[colors][${colorsCount + 1}][color]"
                                   value="#ffffff" class="js-color-picker-toggle c-color-input"
                                   style="background-color: #ffffff;" type="text" readonly/>
                        </td>
                        <td>
                            <input class="js-color-picker-rgb c-color-input c-color-input--data" value="rgb(255, 255, 255)" type="text" readonly/>
                        </td>
                        <td>
                            <input class="js-color-picker-hsl c-color-input c-color-input--data" value="hsl(0, 0%, 100%)" type="text" readonly/>
                        </td>
                    </tr>
            `
            tableBody.append(newColor)
            tableBody.find('tr:last-child .js-color-picker-toggle').on('focus', function () {
                colorPickerBox.addClass('is-open')
                currentColorPicker = $(this)
                const currentColorPickerPos = currentColorPicker.offset()

                console.log(currentColorPickerPos)

                colorPickerBox.css("top", currentColorPickerPos.top);
                colorPickerBox.css("left", currentColorPickerPos.left - 180);
            })
        })

        // Remove color row from colors table
        removeBtns.on('click', function (e) {
            e.preventDefault()
            $(this).closest('tr').remove()
        })
    })
})(jQuery)