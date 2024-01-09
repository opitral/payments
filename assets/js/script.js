let card_number = document.getElementById("card_number")

let number_ph_span = document.getElementById("card_number_ph")
let number_ph_text = number_ph_span.innerText

card_number.oninput = (e) => {
  let val = card_number.value
  card_number.value = format(val, 'card')

  let ph_str = ''

  for (const l in number_ph_text) {
    ph_str += (card_number.value[l] || number_ph_text[l] === " ") ? '&nbsp;' : '_'
  }

  number_ph_span.innerHTML = ph_str

  if (val.length > 19) {
    card_number.value = val.slice(0, -1)
  }
}















let card_data = document.getElementById("card_data")

let data_ph_span = document.getElementById("card_data_ph")
let data_ph_text = data_ph_span.innerText

card_data.oninput = (e) => {
  let val = card_data.value
  card_data.value = format(val, 'data')

  let ph_str = ''

  for (const l in data_ph_text) {
    ph_str += !(card_data.value[l] || data_ph_text[l] === "/") ? '_' : data_ph_text[l] !== "/" ? '&nbsp;' : '/'
  }

  data_ph_span.innerHTML = ph_str

  if (val.length > 5) {
    card_data.value = val.slice(0, -1)
  }

  console.log(card_data.value);
}















let card_cvv = document.getElementById("card_cvv")

let cvv_view = ""

let cvv_ph_span = document.getElementById("card_cvv_ph")
let cvv_ph_text = cvv_ph_span.innerText

let cvv_code = document.getElementById("cvv_code")

card_cvv.oninput = (e) => {
  let val = card_cvv.value
  card_cvv.value = val = format(val, 'cvv')


  // cvv_code += e.data || ""
  
  // if (cvv_code.length > 3 || !e.data) {
  //   cvv_code = cvv_code.slice(0, -1)
  // }


  let ph_str = ''

  for (const l in cvv_ph_text) {
    ph_str += !(card_cvv.value[l]) ? '_' : '&nbsp;'
  }

  cvv_ph_span.innerHTML = ph_str


  if (val.length > 3) {
    card_cvv.value = val = val.slice(0, -1)
  }

  cvv_code.innerText = val.replace(/\w/g,"*")
}


// let pay_btn = document.querySelector('#pay_btn')

// pay_btn.addEventListener("click",(e) => {
//   e.preventDefault()
//   console.log(e);
//   card_cvv.value = cvv_code
//   e.target.submit()
  
// })


















function format(cn, type) {
  const cleaned = cn.replace(/\D/g, '');
  if (!cleaned) return ""
  let groups
  if (type === "card") {
    groups = cleaned.match(/.{1,4}/g);
  }
  else if (type === "data") {
    groups = cleaned.match(/.{1,2}/g);
  }
  else return cleaned

  const formatted = groups.join(' ');
  return formatted;
}