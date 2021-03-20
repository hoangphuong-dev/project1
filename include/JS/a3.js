if (address_2 = localStorage.getItem('address_2_saved')) {
  $('select[name="select_huyen"] option').each(function() {
  })
}
if (huyen = localStorage.getItem('huyen')) {
  $('select[name="select_huyen"]').html(huyen)
  $('select[name="select_huyen"]').on('change', function() {
    var target = $(this).children('option:selected')
    target.attr('selected', '')
    $('select[name="select_huyen"] option').not(target).removeAttr('selected')
    address_2 = target.text()
    huyen = $('select[name="select_huyen"]').html()
    localStorage.setItem('huyen', huyen)
    localStorage.setItem('address_2_saved', address_2)
  })
}
$('select[name="select_tinh"]').each(function() {
  var $this = $(this),
    stc = ''
  c.forEach(function(e) {
    // i += +1
    stc += `<option value= "${e}"  > ${e}  </option>`
    $this.html('<option value="">------Chọn------</option>' + stc)
    if (address_1 = localStorage.getItem('address_1_saved')) {
      $('select[name="select_tinh"] option').each(function() {
      })
    }
    $this.on('change', function(i) {
      i = $this.children('option:selected').index() - 1
      var str = '',
        r = $this.val()
      if (r != '') {
        arr[i].forEach(function(el) {
          str += '<option value="' + el + '">' + el + '</option>'
          $('select[name="select_huyen"]').html('<option value="">------Chọn------</option>' + str)
        })
        var address_1 = $this.children('option:selected').text()
        var huyen = $('select[name="select_huyen"]').html()
        localStorage.setItem('address_1_saved', address_1)
        localStorage.setItem('huyen', huyen)
        $('select[name="select_huyen"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[name="select_huyen"] option').not(target).removeAttr('selected')
          var address_2 = target.text()
          huyen = $('select[name="select_huyen"]').html()
          localStorage.setItem('huyen', huyen)
          localStorage.setItem('address_2_saved', address_2)
        })
      }
       else {
        $('select[name="select_huyen"]').html('<option value="">------Chọn------</option>')
        huyen = $('select[name="select_huyen"]').html()
        localStorage.setItem('huyen', huyen)
        localStorage.removeItem('address_1_saved', address_1)
      }
    })
  })
})