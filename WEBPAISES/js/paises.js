const country = document.getElementById('country')
document.addEventListener("DOMContentLoaded", e => {
    countryData()
})

const  countryData= async () => {
    try {
        const respuesta = await fetch('https://restcountries.eu/rest/v2/all')
        const data = await respuesta.json()
        console.log(data)
        contenedorBanderas(data)       
    } catch (error) {
        console.log(error)
    }
}

const contenedorBanderas = data => {
    let elementos = ''
    data.forEach(item => {
        elementos += `
        <article class="card">
            <img src="${item.flag}" alt="" class="img-fluid">
            <div class="card-content">
                 <center><h3>${item.name}</h3></center>
                
                <p>
                    Region:
                    ${item.region}
                </p>

                <p>
                    Subregion:
                    ${item.subregion}
                </p>  
                                
            </div>
        </article>
        `
    });
    country.innerHTML = elementos
}