<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft Server Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .disabled {
            background-color: #4B5563; /* Darker gray */
            color: #A0AEC0; /* Light gray */
            cursor: not-allowed;
            opacity: 0.7; /* Slightly transparent */
        }
        button:hover:not(.disabled) {
            filter: brightness(90%);
        }
        button:active:not(.disabled) {
            filter: brightness(80%);
        }
    </style>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body style="background-color: #1B1B1F;" class="text-gray-200 flex items-center justify-center min-h-screen">
    <div style="background-color: #2B2B2F;" class="rounded-lg shadow-lg p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold text-center mb-6">Minecraft Server</h1>

        @if(session('message'))
            <p class="text-green-300 text-center mb-4">{{ session('message') }}</p>
        @endif
        @if(session('error'))
            <p class="text-red-500 text-center mb-4">{{ session('error') }}</p>
        @endif

        <div class="flex justify-around mb-6">
            <button id="start-button" class="bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out disabled" disabled>START Server</button>
            <button id="stop-button" class="bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200 ease-in-out disabled" disabled>STOP Server</button>
        </div>

        <div class="text-center mb-4">
            <button id="enter-code-button" class="bg-blue-600 text-white py-2 px-4 rounded">Enter Code</button>
        </div>

        <div class="text-center">
            <h2 class="text-lg">Server Status: 
                <span id="server-status" class="text-red-400">Checking...</span>
            </h2>
            <p id="authorization-message" class="text-green-300 mt-4 hidden"></p>
            <p id="countdown-timer" class="text-yellow-300 mt-2 hidden"></p>
        </div>
    </div>

    <script>
const _0x27cc5d=_0xc1cf;function _0xc1cf(_0x569593,_0x42e681){const _0x418eaf=_0x418e();return _0xc1cf=function(_0xc1cfac,_0x40d156){_0xc1cfac=_0xc1cfac-0x142;let _0x33abff=_0x418eaf[_0xc1cfac];return _0x33abff;},_0xc1cf(_0x569593,_0x42e681);}function _0x418e(){const _0x44fa12=['12nyaait','#stop-button','text-red-500','STOP\x20Server','Server\x20Stopped!','10686379Eelyrf','text-red-400','Access\x20time\x20expired.\x20Please\x20enter\x20the\x20code\x20again.','Error\x20fetching\x20status:\x20','fail','#server-status','text','#start-button','/status','ajaxSetup','attr','1159942lFihYI','success','true','isAuthorized','208WecLEk','909KFGJIb','ready','#enter-code-button','setItem','Stopping\x20server...','addClass','floor','message','disabled','removeClass','Time\x20remaining:\x20','45610FhmXvu','1872665cOiroa','/stop','removeItem','1042554nUiiui','meta[name=\x22csrf-token\x22]','Failed\x20to\x20start\x20the\x20server:\x20','toggleClass','/start','prop','#authorization-message','Server\x20Started!','getTime','12YEepXZ','START\x20Server','done','73703fvJVsB','responseText','1056747UKBJhO','get','Failed\x20to\x20stop\x20the\x20server:\x20','content','click','Error:\x20','#countdown-timer','Starting\x20server...','post','status','getItem','Unknown\x20error','text-green-400','responseJSON','text-green-400\x20text-red-400'];_0x418e=function(){return _0x44fa12;};return _0x418e();}(function(_0x5be6f1,_0x124e2d){const _0x1ea20c=_0xc1cf,_0x112864=_0x5be6f1();while(!![]){try{const _0x24b3df=parseInt(_0x1ea20c(0x17b))/0x1+-parseInt(_0x1ea20c(0x167))/0x2+-parseInt(_0x1ea20c(0x148))/0x3*(-parseInt(_0x1ea20c(0x157))/0x4)+-parseInt(_0x1ea20c(0x178))/0x5*(parseInt(_0x1ea20c(0x143))/0x6)+-parseInt(_0x1ea20c(0x146))/0x7*(-parseInt(_0x1ea20c(0x16b))/0x8)+-parseInt(_0x1ea20c(0x16c))/0x9*(-parseInt(_0x1ea20c(0x177))/0xa)+-parseInt(_0x1ea20c(0x15c))/0xb;if(_0x24b3df===_0x124e2d)break;else _0x112864['push'](_0x112864['shift']());}catch(_0x4daedf){_0x112864['push'](_0x112864['shift']());}}}(_0x418e,0x822c6),$(document)[_0x27cc5d(0x16d)](function(){const _0x1def36=_0x27cc5d,_0x2ee89c=_0x1def36(0x16a),_0x14f3cf='authorizationExpiry';$[_0x1def36(0x165)]({'headers':{'X-CSRF-TOKEN':$(_0x1def36(0x17c))[_0x1def36(0x166)](_0x1def36(0x14b))}});const _0x2c8fc6=localStorage[_0x1def36(0x152)](_0x2ee89c)==='true',_0x29c308=localStorage[_0x1def36(0x152)](_0x14f3cf),_0xf7185=new Date()[_0x1def36(0x142)]();_0x2c8fc6&&_0x29c308?_0xf7185<new Date(_0x29c308)[_0x1def36(0x142)]()?(_0x398508(),_0x541360(new Date(_0x29c308)-_0xf7185)):_0x583515():_0x583515();$(_0x1def36(0x16e))['on']('click',function(){const _0x583b23=_0x1def36,_0x355663=prompt('Enter\x20access\x20code:');_0x355663&&$[_0x583b23(0x150)]('/authorize',{'code':_0x355663})['done'](function(_0x1bf0a1){const _0x4bffb2=_0x583b23;_0x1bf0a1[_0x4bffb2(0x151)]===_0x4bffb2(0x168)?(localStorage['setItem'](_0x2ee89c,_0x4bffb2(0x169)),localStorage[_0x4bffb2(0x16f)](_0x14f3cf,_0x1bf0a1['expiry']),_0x398508(),_0x541360(new Date(_0x1bf0a1['expiry'])-new Date())):alert(_0x1bf0a1[_0x4bffb2(0x173)]);})[_0x583b23(0x160)](function(_0x2f13f9){const _0xd63cf3=_0x583b23;alert(_0xd63cf3(0x14d)+_0x2f13f9[_0xd63cf3(0x155)]['message']);});});function _0x398508(){const _0x1ee380=_0x1def36;$(_0x1ee380(0x16e))['prop']('disabled',!![])[_0x1ee380(0x171)](_0x1ee380(0x174)),$(_0x1ee380(0x163))['prop'](_0x1ee380(0x174),![])[_0x1ee380(0x175)](_0x1ee380(0x174)),$(_0x1ee380(0x158))[_0x1ee380(0x180)](_0x1ee380(0x174),![])[_0x1ee380(0x175)](_0x1ee380(0x174)),$(_0x1ee380(0x181))['text']('Access\x20granted.')[_0x1ee380(0x175)]('hidden'),$('#countdown-timer')[_0x1ee380(0x175)]('hidden');}function _0x583515(){const _0x3094ae=_0x1def36;localStorage[_0x3094ae(0x17a)](_0x2ee89c),localStorage[_0x3094ae(0x17a)](_0x14f3cf);}function _0x541360(_0x13a5c5){const _0x10f8ef=_0x1def36,_0x3264f9=$(_0x10f8ef(0x14e));let _0x265bdc=Math[_0x10f8ef(0x172)](_0x13a5c5/0x3e8);const _0x576273=setInterval(()=>{const _0x38ea1c=_0x10f8ef;if(_0x265bdc<=0x0)clearInterval(_0x576273),_0x583515(),$(_0x38ea1c(0x181))['text'](_0x38ea1c(0x15e))['removeClass']('hidden'),_0x348d65(![]),_0x3264f9[_0x38ea1c(0x162)](''),$('#enter-code-button')[_0x38ea1c(0x180)]('disabled',![])['removeClass'](_0x38ea1c(0x174));else{const _0x2c84e8=Math['floor'](_0x265bdc/0x3c),_0x2080b6=_0x265bdc%0x3c;_0x3264f9[_0x38ea1c(0x162)](_0x38ea1c(0x176)+_0x2c84e8+':'+(_0x2080b6<0xa?'0'+_0x2080b6:_0x2080b6)),_0x265bdc--;}},0x3e8);}$(_0x1def36(0x163))['on'](_0x1def36(0x14c),function(){const _0xaf3449=_0x1def36;if(!localStorage[_0xaf3449(0x152)](_0x2ee89c)){alert('You\x20must\x20enter\x20the\x20access\x20code\x20first.');return;}$(this)[_0xaf3449(0x162)](_0xaf3449(0x14f))[_0xaf3449(0x180)](_0xaf3449(0x174),!![])['addClass'](_0xaf3449(0x174)),$[_0xaf3449(0x150)](_0xaf3449(0x17f))['done'](function(){const _0xe768f5=_0xaf3449;$(_0xe768f5(0x163))[_0xe768f5(0x162)](_0xe768f5(0x182)),_0xaf1ded();})[_0xaf3449(0x160)](function(_0x190db8){const _0x2127a2=_0xaf3449;alert(_0x2127a2(0x17d)+(_0x190db8[_0x2127a2(0x147)]||_0x2127a2(0x153))),$(this)[_0x2127a2(0x180)]('disabled',![])[_0x2127a2(0x175)](_0x2127a2(0x174))[_0x2127a2(0x162)](_0x2127a2(0x144));});}),$(_0x1def36(0x158))['on'](_0x1def36(0x14c),function(){const _0x10d1ce=_0x1def36;if(!localStorage[_0x10d1ce(0x152)](_0x2ee89c)){alert('You\x20must\x20enter\x20the\x20access\x20code\x20first.');return;}$(this)['text'](_0x10d1ce(0x170))[_0x10d1ce(0x180)](_0x10d1ce(0x174),!![])[_0x10d1ce(0x171)](_0x10d1ce(0x174)),$['post'](_0x10d1ce(0x179))[_0x10d1ce(0x145)](function(){const _0x2ff3e1=_0x10d1ce;$('#stop-button')[_0x2ff3e1(0x162)](_0x2ff3e1(0x15b)),_0xaf1ded();})['fail'](function(_0x227c2d){const _0x376c55=_0x10d1ce;alert(_0x376c55(0x14a)+(_0x227c2d[_0x376c55(0x147)]||'Unknown\x20error')),$(this)[_0x376c55(0x180)](_0x376c55(0x174),![])['removeClass'](_0x376c55(0x174))['text'](_0x376c55(0x15a));});});function _0xaf1ded(){const _0x1a3bb9=_0x1def36;$[_0x1a3bb9(0x149)](_0x1a3bb9(0x164))[_0x1a3bb9(0x145)](function(_0x492484){const _0x3ccbd1=_0x1a3bb9;$('#server-status')[_0x3ccbd1(0x162)](_0x492484[_0x3ccbd1(0x151)])[_0x3ccbd1(0x175)](_0x3ccbd1(0x156))[_0x3ccbd1(0x171)](_0x492484['isRunning']?_0x3ccbd1(0x154):_0x3ccbd1(0x15d)),_0x348d65(_0x492484['isRunning']);})['fail'](function(_0x4a8be5){const _0x1347e9=_0x1a3bb9;$(_0x1347e9(0x161))[_0x1347e9(0x162)](_0x1347e9(0x15f)+(_0x4a8be5[_0x1347e9(0x147)]||'Unknown\x20error'))[_0x1347e9(0x171)](_0x1347e9(0x159));});}function _0x348d65(_0x189578){const _0x519575=_0x1def36;$(_0x519575(0x163))[_0x519575(0x180)](_0x519575(0x174),_0x189578)[_0x519575(0x17e)](_0x519575(0x174),_0x189578),$(_0x519575(0x158))[_0x519575(0x180)](_0x519575(0x174),!_0x189578)['toggleClass'](_0x519575(0x174),!_0x189578);}_0xaf1ded(),setInterval(_0xaf1ded,0xbb8);}));

    </script>
</body>
</html>
