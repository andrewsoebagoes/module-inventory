window.items = []
$('.select2').select2()
$('.select2-item').select2({
    minimumInputLength: 3,
    ajax: {
        url: '/inventory/get-items',
        dataType: 'json',
        processResults: function (data) {
            return {
                results: $.map(data.data, function (item) {
                    return {
                        text: item.name,
                        id: item.barcode
                    }
                })
            };
        }
      // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
    }
}).on('select2:select', function() {
    var label = $(".select2-item option:selected").text();
    var id = $(".select2-item option:selected").val();

    addItems(id, label)

    setTimeout(f => {
        $('.select2-item').val('').trigger('change');
    }, 250)
})


function addItems(id, label)
{
    try
    {
        window.items.find(item => item.id == id).value++
    }catch(error)
    {
        window.items.push({
            id, label, value: 1
        })
    }

    initItems()
}

function deleteItem(id)
{
    try
    {
        window.items = window.items.filter(item => item.id != id)
    }catch(error)
    {
    }

    initItems()
}

function updateItem(value, id)
{
    try
    {
        window.items.find(item => item.id == id).value = value
    }catch(error)
    {
    }
}


function initItems()
{

    const emptyRow = `<tr><td colspan="3" class="text-center">Silahkan cari item atau scan barcode</td></tr>`

    if(window.items.length == 0)
    {
        $('#stock-panel-table > tbody').html(emptyRow)
        return
    }
    var rows = ''
    window.items.forEach(item => {
        rows += `<tr>
                    <td><button class="btn btn-danger" type="button" onclick="deleteItem('${item.id}')"><i class="fas fa-times"></i></button></td>
                    <td>${item.label}</td>
                    <td><input type="number" class="form-control" name="items[${item.id}]" value="${item.value}" onchange="updateItem(this.value, '${item.id}')"></td>
                </tr>`
    })

    $('#stock-panel-table > tbody').html(rows)

}

function scan() {
    const htmlscanner = new Html5QrcodeScanner("my-qr-reader", {
        fps: 10,
        qrbox: 250
    });

    // Fungsi yang akan dipanggil saat QR code berhasil di-scan
    function onScanSuccess(decodedText, decodedResult) {
        // $('#qrcode_value').val(decodedText);
        let id = decodedText;
        htmlscanner.clear().then(_ => {
            $.ajax({
                url: '/inventory/find-item',
                method: 'POST',
                data: {
                    _token: document.querySelector('[name=_token]').value,
                    barcode: id
                },
                success: function(response) {
                    const data = response.data
                    addItems(data.barcode, data.name)
                },
                error: function(xhr, status, error) {
                    console.error(`Error: ${xhr.responseText}`);
                }
            });
        }).catch(error => {
            alert('something wrong');
        });
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }


    htmlscanner.render(onScanSuccess);
}

function stopScan() {
    Quagga.stop();
    // $(".btn-scan").trigger("click");
}