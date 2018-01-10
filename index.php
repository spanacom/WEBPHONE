<?
if(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] !== 'https' || empty($_SERVER['HTTP_X_FORWARDED_PROTO'])){
header("location: https://spanads.com/e14/webphone");exit();
}


?><!DOCTYPE html>
<html>
<!-- head -->
<head>
    <meta charset="utf-8" />
    <title>sipML5 live demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="SIPml-api.js?svn=251" type="text/javascript"> </script>

    <!-- Javascript code -->
    <script type="text/javascript">


//START CONFIGURATION

var global_displayname = '34682288834', //CALLERID
global_txtPrivateIdentity= 'WEBPHONE22', //USER FROM SIP FOR WEBPHONE
global_password = 'WEBPHONE22', //PASSWORD FROM SIP FOR WEBPHONE
global_lang = 'en'; //LANGUAGE FOR TTS

//END CONFIGURATION

//CALLBACK ON START CALL
var callback_onstartcall = function(sRemoteNumber){
console.log('callback_onstartcall');
                            document.getElementById('divcallteclado').style.display='none';
                            document.getElementById('divCallCtrl').style.display='inline';
                            
                            if(sRemoteNumber == 'asterisk'){
                                startRingbackTone();
btnCall.style.display='none';
                            //OJOAKI Recibo respuesta con el desvio de llamada del api de llamar desde webphone
                            //console.log('OJOAKI Recibo respuesta con el desvio de llamada del api de llamar desde webphone');
                            txtCallStatus.innerHTML = "<i>Starting call..</i>";
                            showNotifICall(sRemoteNumber);
                            
                            setTimeout(function(){
                            btcncallclickya();
                            },1000);
                            }else{
                                startRingTone();
                            
btnCall.style.display='inline';
                            txtCallStatus.innerHTML = "<i>Incoming call from [<b>" + sRemoteNumber + "</b>]</i>";
                            showNotifICall(sRemoteNumber);
                            }
                            
},
callback_onendcall = function(){//CALLBACK ON END CALL
console.log('callback_onendcall');
                            document.getElementById('divcallteclado').style.display='inline';
                            document.getElementById('divCallCtrl').style.display='none';
                            closeKeyPad();
}
    </script>
    <script src="spasip.js?i=<?=time()?>" type="text/javascript"> </script>
</head>

<body style="cursor:wait">

<label style="width: 100%;" align="center" id="txtRegStatus">
                </label>
            <div id="divcallteclado" class="span7 well" style='display:table-cell; vertical-align:middle'>
                <h2>
                    Llamar
                </h2>
                <br />
                <form method="GET" action="javascript:spatrixnewcall();">
                <select id="typesip">
<option value="phone" selected>Teléfono</option>
<option value="sip">SIP interna</option></select>
                <input type="text" id="phonetocall" value="34682288834"/>
                <input type="submit" value="llamar"></form>
            </div>
            

            <div id="divCallCtrl" class="span7 well" style='display:none; vertical-align:middle'>
                <label style="width: 100%;" align="center" id="txtCallStatus">
                </label>
                <h2>
                    Recibir
                </h2>
                <br />
                <table style='width: 100%;'>
                    <tr>
                        <td colspan="1" align="right">
                            <div class="btn-toolbar" style="margin: 0; vertical-align:middle">
                                <!--div class="btn-group">
                                    <input type="button" id="btnBFCP" style="margin: 0; vertical-align:middle; height: 100%;" class="btn btn-primary" value="BFCP" onclick='sipShareScreen();' disabled />
                                </div-->
                                <div id="divBtnCallGroup" class="btn-group">
                                    <button id="btnCall" disabled class="btn btn-primary" data-toggle="dropdown" style="display: none;">Call</button>
                                </div>&nbsp;&nbsp;
                                <div class="btn-group">
                                    <input type="button" id="btnHangUp" style="margin: 0; vertical-align:middle; height: 100%; display:none;" class="btn btn-primary" value="HangUp" onclick='sipHangUp();' />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align='center'>
                            <div id='divCallOptions' class='call-options' style='opacity: 0; margin-top: 0px'>
                                <input type="button" class="btn" style="" id="btnFullScreen" value="FullScreen" disabled onclick='toggleFullScreen();' /> &nbsp;
                                <input type="button" class="btn" style="" id="btnMute" value="Mute" onclick='sipToggleMute();' /> &nbsp;
                                <input type="button" class="btn" style="" id="btnHoldResume" value="Hold" onclick='sipToggleHoldResume();' /> &nbsp;
                                <input type="button" class="btn" style="" id="btnTransfer" value="Transfer" onclick='sipTransfer();' /> &nbsp;
                                <input type="button" class="btn" style="" id="btnKeyPad" value="KeyPad" onclick='openKeyPad();' />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
            
            
    <!-- /container -->
    <!-- Glass Panel -->
    <div id='divGlassPanel' class='glass-panel' style='visibility:hidden'></div>
    <!-- KeyPad Div -->
    <div id='divKeyPad' class='span2 well div-keypad' style="left:0px; top:0px; width:250; height:240; visibility:hidden">
        <table style="width: 100%; height: 100%">
            <tr><td><input type="button" style="width: 33%" class="btn" value="1" onclick="sipSendDTMF('1');" /><input type="button" style="width: 33%" class="btn" value="2" onclick="sipSendDTMF('2');" /><input type="button" style="width: 33%" class="btn" value="3" onclick="sipSendDTMF('3');" /></td></tr>
            <tr><td><input type="button" style="width: 33%" class="btn" value="4" onclick="sipSendDTMF('4');" /><input type="button" style="width: 33%" class="btn" value="5" onclick="sipSendDTMF('5');" /><input type="button" style="width: 33%" class="btn" value="6" onclick="sipSendDTMF('6');" /></td></tr>
            <tr><td><input type="button" style="width: 33%" class="btn" value="7" onclick="sipSendDTMF('7');" /><input type="button" style="width: 33%" class="btn" value="8" onclick="sipSendDTMF('8');" /><input type="button" style="width: 33%" class="btn" value="9" onclick="sipSendDTMF('9');" /></td></tr>
            <tr><td><input type="button" style="width: 33%" class="btn" value="*" onclick="sipSendDTMF('*');" /><input type="button" style="width: 33%" class="btn" value="0" onclick="sipSendDTMF('0');" /><input type="button" style="width: 33%" class="btn" value="#" onclick="sipSendDTMF('#');" /></td></tr>
            <tr><td colspan=3><input type="button" style="width: 100%" class="btn btn-medium btn-danger" value="close" onclick="closeKeyPad();" /></td></tr>
        </table>
    </div>
    <!-- Call button options -->

    <!-- Audios -->
    <audio id="audio_remote" autoplay="autoplay"> </audio>
    <audio id="ringtone" loop src="sounds/ringtone.wav"> </audio>
    <audio id="ringbacktone" loop src="sounds/ringbacktone.wav"> </audio>
    <audio id="dtmfTone" src="sounds/dtmf.wav"> </audio>

</body>
</html>
