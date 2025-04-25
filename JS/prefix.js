"use strict";



prefixtel();
async function prefixtel()
{
    const response = await fetch("/JSON/prefixtel.json");
    // console.log(response);
    if(!response.ok)return;
    // await ne gère pas, le catch, donc on utilisera généralement un "try catch"
    try 
    {
        const data = await response.json();
        console.log(data); 
        createlist(data)       
    } catch (error) 
    {
        console.error(error);        
    }
}

/**
 * 
 * @param {Array} data 
 */

function createlist(data){ 
    const select = document.querySelector("#prefix")
data.forEach(pays => {
    const option = document.createElement("option") 
    select.append(option)
    option.textContent = pays.code + pays.dial_code
    option.value = pays.dial_code
})

}