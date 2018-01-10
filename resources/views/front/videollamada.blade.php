@extends('layouts.app')

@section('title', "Videollamada")

@section('content')
    <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txt-roomid" placeholder="ID de sesión única">
                </div>
                <br>
                <button type="button" class="btn btn-success" id="btn-open-or-join-room">Open or Join Room</button>
                <button type="button" class="btn btn-danger" id="btn-close">Desconectar</button>
                <hr>

                <div class="form-group col-sm-6">
                    <div id="local-videos-container"></div>
                    <hr>
                    <div id="remote-videos-container"></div>
                </div>
                <div class="form-group col-sm-6">
                    otro form
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
    <script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
    <script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>
    <script>
        $(function () {
//Videollamada
            var connection = new RTCMultiConnection();

            connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/'; //servidor de nodejs gratuito para RTCMultiConnection

            connection.session = {
                audio: true,
                video: true
            };

            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: true,
                OfferToReceiveVideo: true
            };

            var localvideoscontainer = document.getElementById('local-videos-container');
            var remotevideoscontainer = document.getElementById('remote-videos-container');

            connection.onstream = function (event) {
                var video = event.mediaElement;

                if (event.type === "local") {
                    localvideoscontainer.appendChild(video);
                }

                if (event.type === "remote") {
                    remotevideoscontainer.appendChild(video);
                }
            };

            var roomid = document.getElementById('txt-roomid');

            roomid.value = (Math.random() * 1000).toString().replace('.', '');

            document.getElementById('btn-open-or-join-room').onclick = function () {
                this.dissabled = true;
                connection.openOrJoin(roomid.value || 'predefined-roomid');
            }

            document.getElementById('btn-close').onclick = function () {
                this.dissabled = true;
                //connection.closeEntireSession();
                // stop all local cameras
                connection.attachStreams.forEach(function (localStream) {
                    localStream.stop();
                });

                // close socket.io connection
                connection.close();
            }


        });
    </script>
@endpush