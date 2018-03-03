<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="<?php echo base_url('css/foundation.css');?>">
  
<link rel="stylesheet" href="<?php echo base_url('css/app.css');?>">

</head>
 <SCRIPT type="text/javascript">
/* <![CDATA[ */
 
function validate() 
{ 
if (isValueNonemptyString('first_name') && isValueNonemptyString('last_name') && isEmailAddress('email')&& isValueNonemptyString('postcode')&& isMoreThanEightCharacters('tel'))
{
return true;
}
else
{
return false;
}
}
///////////////////////////////////////////////////////////////////////////
function isValueNonemptyString(id)
{

var value = document.getElementById(id).value;
var lettersOnly=/^[a-zA-Z]+$/;
if (value != null && value != ""&& lettersOnly.test(value))
{
document.getElementById(id).nextSibling.textContent="";
result = true;
}
else
{
//outputs an indiction of error after the input 
document.getElementById(id).nextSibling.style.background="yellow";
document.getElementById(id).nextSibling.textContent= " <-- Please check this field there seems to be an error.";
result = false;
}
return result;
}
/////////////////////////////////////////////////////////////////////////////

function isEmailAddress(id)
{
var value = document.getElementById(id).value;
var lettersOnly=/^[a-zA-Z]+$/;
if (value.indexOf('@') != -1 && value.indexOf('.') != -1 )
{
document.getElementById(id).nextSibling.textContent="";
result = true;
}
else
{
//outputs an indiction of error after the input 
document.getElementById(id).nextSibling.style.background="yellow";
document.getElementById(id).nextSibling.textContent=" <-- Please check this field, the email may have an incorrect format.";
result = false;
}
return result;
}
///////////////////////////////////////////////////////////////////////////////

function isMoreThanEightCharacters(id)
{
var value = document.getElementById(id).value;
if (value.length >= 8)
{
document.getElementById(id).nextSibling.textContent="";
result = true;
}
else
{
//outputs an indiction of error after the input 
document.getElementById(id).nextSibling.style.background="yellow";
document.getElementById(id).nextSibling.textContent=" <-- The telephone number needs to be eight characters or more!";
result = false;
}
return result;
}
//////////////////////////////////////////////////////////////////////////////
function isSelected(id1,id2)
{
if (document.getElementById(id1).checked || document.getElementById(id2).checked)
{
//this will delete male/female.
var sib = document.getElementById(id2).nextSibling
sib.nextSibling.textContent="";
result = true;
}
else 
{
//the next sibling is male/female so this stores this sibling to get the one after it..
var sib = document.getElementById(id2).nextSibling
sib.nextSibling.style.background="yellow";
sib.nextSibling.textContent=" <-- Please select a gender! ";
result = false;
}
return result;
}
////////////////////////////////////////////////////////////////////////////////
function addMessage(id,text)
{
var textNode = document.createTextNode(text);
var element = document.getElementById(id);
element.appendChild(textNode);
}
///////////////////////////////////////////////////////////////////////////
function whats()
{
var list_of_properties = "The windows object: ";
for (property in window.document)
{
list_of_properties += property + ", ";
}
list_of_properties = list_of_properties.slice(0,-2);
alert(list_of_properties);
}
/* ]]> */
</SCRIPT>
  <body>
