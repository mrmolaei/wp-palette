(function ($) {
    $(document).ready(function () {
        let currentColorPicker = {} // Holds the current input.
        const colorInputs = $('.js-color-picker-toggle')
        const colorPickerBox = $('.js-color-picker-box')
        const colorPicker = new iro.ColorPicker('.js-color-picker')
        const addColorBtn = $('.js-add-color')

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
            colorPickerBox.css("left", currentColorPickerPos.left - 180);
        })

        colorInputs.on('blur', function () {
            colorPickerBox .removeClass('is-open')
        })

        addColorBtn.on('click', function (e) {
            e.preventDefault()
            const tableBody = $('.js-colors-table-body')
            const colorsCount = tableBody.find('tr').length
            const newColor = `
                <tr>
                        <td>
                            <input name="wp_palette_data[colors][${colorsCount + 1}][name]"
                                   value="Color name">
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
    })
})(jQuery)