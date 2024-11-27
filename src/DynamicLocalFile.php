<?php

namespace MWStake\MediaWiki\Component\DynamicFileDispatcher;

use MediaWiki\MediaWikiServices;
use MediaWiki\Rest\Stream;
use Psr\Http\Message\StreamInterface;
use Wikimedia\Mime\MimeAnalyzer;

abstract class DynamicLocalFile implements IDynamicFile {
	
	/**
	 * @var MimeAnalyzer
	 */
	private MimeAnalyzer $mimeAnalyzer;

	/**
	 * @param MimeAnalyzer $mimeAnalyzer
	 */
	public function __construct( MimeAnalyzer $mimeAnalyzer ) {
		$this->mimeAnalyzer = $mimeAnalyzer;
	}

	/**
	 * @return string
	 */
	public function getMimeType(): string {
		return $this->mimeAnalyzer->guessMimeType( $this->getAbsolutePath() );
	}
	
	/**
	 * @return string
	 */
	abstract protected function getAbsolutePath();

	/**
	 * @return StreamInterface
	 */
	public function getStream(): StreamInterface {
		return new Stream( fopen( $this->getAbsolutePath(), 'rb' ) );
	}
}
