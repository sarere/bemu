<?php

namespace App\Http\Controllers;

use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\MessageEvent\TextMessage;
use LINE\LINEBot\Exception\InvalidEventRequestException;
use LINE\LINEBot\Exception\InvalidSignatureException;
use Illuminate\Http\Request;



class LineController extends Controller
{
	public function notification(){
	 	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('VlYALXJ+Wn7BqmDfQDAdJAAYqNx7hCq+IRCR3JpjsgiWVMBek3NNpprCYYbnzsi7531BPRV9vTk/k+u0QXrRIvfhMnGDYBKxzgvVq+BMqK1BS1tZJzE7fChSHd7XqyR4Eh59jNOXoI5QvhJsNPC9ZgdB04t89/1O/w1cDnyilFU=');
    	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '38653287eac25e6e04cfeaf4b8a14736']);

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('tes');
        $resp = $bot->pushMessage('Uce0eb673441b45ba7f069461f3549667', $textMessageBuilder);
        $logger->info($resp->getHTTPStatus() . ' ' . $resp->getRawBody());
        
        return response('OK',200);
	}
	
    public function callback(Request $request){
    	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('VlYALXJ+Wn7BqmDfQDAdJAAYqNx7hCq+IRCR3JpjsgiWVMBek3NNpprCYYbnzsi7531BPRV9vTk/k+u0QXrRIvfhMnGDYBKxzgvVq+BMqK1BS1tZJzE7fChSHd7XqyR4Eh59jNOXoI5QvhJsNPC9ZgdB04t89/1O/w1cDnyilFU=');
	    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '38653287eac25e6e04cfeaf4b8a14736']);

	    $signature = Request::header(HTTPHeader::LINE_SIGNATURE);
	    // if (empty($signature)) {
	    //     return response('Bad Request',400);
	    // }

	    try {
	        $events = $bot->parseEventRequest( Request::getContent(), $signature) ;
	    } catch (InvalidSignatureException $e) {
	        return response('Invalid signature',400);
	    } catch (InvalidEventRequestException $e) {
	        return response("Invalid event request",400);
	    }

	    foreach ($events as $event) {
	        if (!($event instanceof MessageEvent)) {
	            echo 'Non message event has come';
	            continue;
	        }

	        if (!($event instanceof TextMessage)) {
	            // $logger->info('Non text message has come');
	            // continue;
	            //\uDBC0\uDC84 LINE emoji
	            $response = $bot->getProfile($event->getUserId());
	            if ($response->isSucceeded()) {
	                $profile = $response->getJSONDecodedBody();
	                echo $profile['displayName'];
	                echo $profile['pictureUrl'];
	                echo $profile['statusMessage'];

	                $tes=$event->getUserId();

	                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($event->getUserId()."grupid".$event->getGroupId());
	                $resp = $bot->replyMessage($event->getReplyToken(), $textMessageBuilder);
	                echo $resp->getHTTPStatus() . ' ' . $resp->getRawBody();
	            } else {
	                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
	                $resp = $bot->replyMessage($event->getReplyToken(), $textMessageBuilder);
	                echo $resp->getHTTPStatus() . ' ' . $resp->getRawBody();
	            }
	            
	        }

	        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder(1,1);
	        $resp = $bot->replyMessage($event->getReplyToken(), $textMessageBuilder);
	        echo $resp->getHTTPStatus() . ' ' . $resp->getRawBody();
	    }

	    

	    return response('OK',200);
    }
}
