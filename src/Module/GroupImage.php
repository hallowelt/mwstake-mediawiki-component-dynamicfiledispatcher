<?php

namespace MWStake\MediaWiki\Component\DynamicFileDispatcher\Module;

use MediaWiki\Permissions\Authority;
use MWStake\MediaWiki\Component\DynamicFileDispatcher\File\DefaultArticlePreviewImage;
use MWStake\MediaWiki\Component\DynamicFileDispatcher\File\DefaultGroupImage;
use MWStake\MediaWiki\Component\DynamicFileDispatcher\IDynamicFile;
use MWStake\MediaWiki\Component\DynamicFileDispatcher\IDynamicFileModule;
use Wikimedia\Mime\MimeAnalyzer;

class GroupImage implements IDynamicFileModule {

	/**
	 * @var MimeAnalyzer
	 */
	protected MimeAnalyzer $mimeAnalyzer;

	/**
	 * @param MimeAnalyzer $mimeAnalyzer
	 */
	public function __construct( MimeAnalyzer $mimeAnalyzer ) {
		$this->mimeAnalyzer = $mimeAnalyzer;
	}

	/**
	 * @inheritDoc
	 */
	public function isAuthorized( Authority $user, array $params ): bool {
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function getFile( array $params ): ?IDynamicFile {
		return new DefaultGroupImage( $this->mimeAnalyzer );
	}
}
