self.addEventListener('message', function(e) {
var data = e.data;

switch(data.cmd) {
    case 'start':
        self.postMessage('serveur démarré');
        break;
    case 'message':
        self.postMessage('petit message qui va bien :p');
        break;
    case 'calcul':
        self.postMessage('calcul en cours');

        var start = (new Date).getTime();
        var msg = '';

        for(var i=0; i<=20000000; i++) {
            msg = 'incrementation : '+i;
        }

        var diff = (new Date).getTime() - start;

        self.postMessage(diff+' ms');
        break;
    default:
        self.postMessage('oO ???');
}
}, false);