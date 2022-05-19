import { useBlockProps } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';

const Edit = () => {
    const [ jobData, storeJobs ] = useState(false);

    const blockProps = useBlockProps({ 
        className: `greenhouse${ !jobData ? ' loading' : ''}`
    });

    if( !jobData ) {
        apiFetch({ 
            url: '/wp-json/mcgjb/greenhouse'
        }).then(response => {
            storeJobs(response);
        });
    }

    return (
        <section { ...blockProps}>
            { jobData 
                ?  Object.entries( jobData ).map( ([ department, jobs ]) => 
                    <div className="greenhouse__dept">
                        <h2 className="greenhouse__dept-title">{ department }</h2>
                        <div className="row">
                            { Object.values(jobs).map( job =>
                                <div className="greenhouse__job">
                                    <div className="greenhouse__job-text">
                                        <div className="greenhouse__job-link">
                                            <h3 className="greenhouse__job-title">{ job.title }</h3>
                                            <span className="greenhouse__job-location">{ job.location.name }</span>
                                        </div>
                                    </div>
                                </div>
                            ) }
                        </div>
                    </div>
                ) 
                : <h2 className="greenhouse__dept-title">{ __('Loading Jobs...', 'mcgjb') }</h2>
            }
        </section>
    );
};
export default Edit;