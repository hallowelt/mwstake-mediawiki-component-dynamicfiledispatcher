<?php

namespace MWStake\MediaWiki\Component\DynamicFileDispatcher\File;

use BlueSpice\DynamicFileDispatcher\Module;
use MWStake\MediaWiki\Component\DynamicFileDispatcher\DynamicLocalFile;
use MediaWiki\MediaWikiServices;
use MediaWiki\Revision\RevisionRecord;

class DefaultArticlePreviewImage extends DynamicLocalFile {

	/**
	 *
	 * @return string
	 */
	protected function getAbsolutePath() {
		return dirname( __DIR__, 2 ) . '/resources/defaultArticlePreviewImage.png';
	}

	/**
	 * @return string
	 */
	public function getMimeType(): string {
		return 'image/png';
	}
}
