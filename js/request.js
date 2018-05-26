document.getElementById("sendRequestButton").onclick = function requestAlert ()
{
  var vaccin = document.forms["vaccinationToTake"]["bookingRequestForm"].value;

  if (vaccin == "")
  {
    alert("Var vänlig välj vaccin!");
    return false;
  }
  else
  {
    alert("Tack för din bokningsförfrågan! En vaccinationsgivare kontaktar dig inom kort! :) ");
    return true;
  }
}
