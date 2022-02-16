/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps } from '@wordpress/block-editor';
import apiFetch from '@wordpress/api-fetch';
import axios from 'axios';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
    meta = getGitMeta();

    return <div style="background: 'green'" {...useBlockProps.save()}>
        {attributes.message}
        </div>;
}

function getGitMeta() {
    let headers = {
        'accept': '*/*'
    }

    const req = apiFetch({
        url: 'https://api.github.com/users/tylerkanz',
        headers: headers,
        mode: 'no-cors',
        method: 'GET'
    }).then((result)=>{
        return result
    }).catch(e=>{
        console.log('Error: ', e)
    })
}










