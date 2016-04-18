<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */
require_once APPPATH . '../vendor/autoload.php';

//use \ElasticSearch\Client;
use \MonoLog\Logger;
use \Elasticsearch\ClientBuilder;
/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Common
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$handlerParams = [
		    'max_handles' => 1000
		];

		$defaultHandler = ClientBuilder::defaultHandler($handlerParams);
		
		$logger = ClientBuilder::defaultLogger(APPPATH.'../log_search.log');
		
		$hosts = [
		    '127.0.0.1:9200',         // IP + Port
		];
		
		$client = ClientBuilder::create()->setHosts($hosts)->setRetries(0)->setLogger($logger)->setHandler($defaultHandler)->build();
		
		/*$params = array(
		    'index' => 'blog',
		    'type' => 'artical',
		    'id' => '3',
		);*/

		/*$params = array(
			'index' => 'blog',
			'type' => 'artical',
			'id' => 3,
			'client' => array(
				'ignore'=>'404',
				'timeout'=>10,
				'connect_timeout'=>10,
				'future'=>'lazy'
			) 
		);*/

		/*$params = array(
			'index'=>'blog',
			'type'=>'artical',
			'body'=>array(
				'query'=> array(
					'match'=>array(
						'name'=>'John'
					)
				),
				'highlight' => array(
			        'fields' => array(
			            'content' => new \stdClass()
			        )
			    ),
			    'sort' => array(
			    	'name' => array('order' => 'desc')
			    )
			),
			'client'=>array('future'=>'lazy')
		);*/

		/*$params = array(
			'index' => 'news',
			'body' => array(
				'settings' => array(
					'analysis'=>array(
						'analyzer'=>array(
							'reuters'=>array(
								'type'=>'custom',
								'tokenizer'=>'standard',
								'filter'=>array('lowercase', 'stop', 'kstem')
							)
						)
					)
				),
				'mappings' => array(
					'_default_'=>array(
						'properties'=>array(
							'title'=>array(
								'type'=>'string',
								'analyzer' => 'reuters',
								'term_vector' => 'yes',
							),
							'body'=>array(
								'type'=>'string',
								'analyzer' => 'reuters',
								'term_vector' => 'yes',
							)
						)
					),
					'detail'=>array(
						'properties'=>array(
							'detail_new'=>array(
								'type'=>'string'
							)
						)
					)
				)
			)
		);*/

//		$params = ['index' => 'news'];

		//params index
		/*$params = array(
			'index'=>'news',
			'type'=>'detail',
			'body'=>array(
				'title' => 'nhung loi noi doi ngot ngao',
				'body' => 'nhung loi noi doi de thuong',
				'detail_new' => 'nhung loi noi doi dang yeu'
			)
		);*/
		/*$params = [
		    'index' => 'news',
		    'type' => 'detail',
		    'id' => 'AVPgkR-83SRXrVL1LEdI'
		];*/

		$params = array(
			'index' => 'news',
			'type' => 'detail',
			'body'=>array(
				'query' => array(
					'match'=>array(
						'detail_new'=>'yeu'
					)
				)
			)
		);

		try{
			//$response = $client->get($params);
			/*$future = $client->get($params);
			$response = $future->wait();*/
			//$response['search'] = $client->search($params);
			//$response = $client->indices()->delete($params);
			//$response = $client->indices()->create($params);
			//$response = $client->index($params);
			//$response = $client->get($params);
			$response = $client->search($params);
			//$response = $client->indices()->getMapping();
			
		}catch(Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost $e){
			$previous = $e->getPrevious();
		    echo $e->getMessage();	
		}
		/*$response = $client->get($params);*/
		var_dump('<pre>',$response,'</pre>');die();
		/*$log = new Logger('long');
		$log->addWarning('dasdas');*/
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a Presenter to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		/*$arr_user = Model_User::find('all');
		foreach ($arr_user as $key => $value) {
			echo $value['username'];
		}
		die();*/
		return Response::forge(Presenter::forge('welcome/hello'));
		/*$data['tp'] = 'the phuc';
		$data['name'] = 'the phuc';*/
		//return Response::forge(View::forge('welcome/hello',$data));
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(Presenter::forge('welcome/404'), 404);
	}
}
