const toast = (id, message, msgtype = 'success', options = {}) => {
    const toastEl = document.querySelector(id)
    const body = document.querySelector('.toast-body')
    const type = document.querySelector('#type')
    const status = document.querySelector('.status')
    const toast = new bootstrap.Toast(toastEl, options)
    body.innerHTML = message;
    type.innerHTML = msgtype[0].toUpperCase() + msgtype.slice(1)

    if(msgtype){
        status.classList.contains(`text-${msgtype}`) && status.classList.remove(`text-${msgtype}`);
        status.classList.add(`text-${msgtype}`)
    }

    toast.show()
}



