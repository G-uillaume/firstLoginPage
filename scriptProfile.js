const logout = document.querySelector('#logout')
const link = document.querySelector('#logout a')
const main = document.querySelector('main')
const profile = document.querySelector('#profile')



logout.addEventListener('mouseover', (e) => {
    const alert = document.createElement('div')
    alert.id = 'alert'
    const h1 = document.createElement('h1')
    h1.textContent = "Chuck Norris doesn't allow you to log out"
    alert.appendChild(h1)
    main.appendChild(alert)
    setTimeout(() => alert.style.display = "none", 1500)
})
logout.addEventListener('mouseout', () => {
    main.removeChild(document.querySelector('#alert'))
})