<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section1QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 1,
                'text' => 'What do the letters CDM stand for?',
                'explanation' => 'The CDM Regulations impose duties to manage construction projects, ensure physical safeguards are provided to prevent danger during such projects and that adequate welfare facilities are provided.',
                'options' => [
                    ['text' => 'Control of Demolition and Management Regulations', 'is_correct' => false],
                    ['text' => 'Control of Dangerous Materials Regulations', 'is_correct' => false],
                    ['text' => 'Construction (Demolition Management) Regulations', 'is_correct' => false],
                    ['text' => 'Construction (Design and Management) Regulations', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Identify one method of enforcing regulations that are available to the Health and Safety Executive:',
                'explanation' => 'Improvement notices require action to achieve standards which meet health and safety law.',
                'options' => [
                    ['text' => 'Health Notice', 'is_correct' => false],
                    ['text' => 'Improvement Notice', 'is_correct' => true],
                    ['text' => 'Obstruction Notice', 'is_correct' => false],
                    ['text' => 'Increasing insurance premiums', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What happens if a Prohibition Notice is issued by an Inspector of the local authority or the HSE?',
                'explanation' => 'The work activity covered by a prohibition notice must cease, until the identified danger is removed.',
                'options' => [
                    ['text' => 'The work in hand can be completed, but no new work started', 'is_correct' => false],
                    ['text' => 'The work can continue if adequate safety precautions are put in place', 'is_correct' => false],
                    ['text' => 'The work that is subject to the notice must cease', 'is_correct' => true],
                    ['text' => 'The work can continue, provided a risk assessment is carried out', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'A Health and Safety Executive Inspector can?',
                'explanation' => 'Inspectors have a range of powers, including the right to visit premises at any time.',
                'options' => [
                    ['text' => 'Only visit if they have made an appointment', 'is_correct' => false],
                    ['text' => 'Visit at any time', 'is_correct' => true],
                    ['text' => 'Only visit if accompanied by the principal contractor', 'is_correct' => false],
                    ['text' => 'Only visit to interview the site manager', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'A Prohibition Notice means:',
                'explanation' => 'The work activity covered by the prohibition notice must cease, until the identified danger is removed.',
                'options' => [
                    ['text' => 'When you finish the work you must not start again', 'is_correct' => false],
                    ['text' => 'The work must stop immediately', 'is_correct' => true],
                    ['text' => 'Work is to stop for that day only', 'is_correct' => false],
                    ['text' => 'Work may continue until the end of the day', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'In what circumstances can an HSE Improvement Notice be issued?',
                'explanation' => 'Improvement notices require action to achieve standards which meet health and safety law.',
                'options' => [
                    ['text' => 'If there is a breach of legal requirements', 'is_correct' => true],
                    ['text' => 'By warrant through the police', 'is_correct' => false],
                    ['text' => 'Only between Monday and Friday on site', 'is_correct' => false],
                    ['text' => 'Through the prosecution office', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What is an Improvement Notice?',
                'explanation' => 'Improvement notices require action to achieve standards which meet health and safety law.',
                'options' => [
                    ['text' => 'A notice issued by the site principal contractor to tidy up the site', 'is_correct' => false],
                    ['text' => 'A notice from the client to the principal contractor to speed up the work', 'is_correct' => false],
                    ['text' => 'A notice issued by a Building Control Officer to deepen foundations', 'is_correct' => false],
                    ['text' => 'A notice issued by an HSE/local authority Inspector to enforce compliance with health and safety legislation', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'If a Health and Safety Executive Inspector issues a Prohibition Notice, this means that:',
                'explanation' => 'Prohibition notices are intended to stop activities which can cause serious injury.',
                'options' => [
                    ['text' => 'The Site Manager can choose whether or not to ignore the notice', 'is_correct' => false],
                    ['text' => 'Specific work activities, highlighted on the notice, must stop', 'is_correct' => true],
                    ['text' => 'The HSE must supervise the work covered by the notice', 'is_correct' => false],
                    ['text' => 'The HSE must supervise all work from then on', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Employers are required to provide information to their employees on their health and safety rights and responsibilities and how to get advice by:',
                'explanation' => 'This is a requirement of the Health and Safety Information for Employees Regulations (as amended).',
                'options' => [
                    ['text' => 'Telling them verbally when they start work for them', 'is_correct' => false],
                    ['text' => 'Displaying a poster or giving them leaflets approved by the HSE', 'is_correct' => true],
                    ['text' => 'Making them read the company health and safety policy', 'is_correct' => false],
                    ['text' => 'E-mailing the information to them', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Who is responsible for signing a Company Safety Policy?',
                'explanation' => 'The Health and Safety at Work Act requires the most senior member of management to sign the health and safety policy statement.',
                'options' => [
                    ['text' => 'Site Manager', 'is_correct' => false],
                    ['text' => 'Company Safety Officer', 'is_correct' => false],
                    ['text' => 'Company Secretary', 'is_correct' => false],
                    ['text' => 'Managing Director', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => "Which one of the following must be in a company's written Health and Safety Policy?",
                'explanation' => 'This is a specific requirement of the Health and Safety at Work Act.',
                'options' => [
                    ['text' => 'Aims and objectives of the company', 'is_correct' => false],
                    ['text' => 'Organisation and arrangements in force for carrying out the health and safety policy', 'is_correct' => true],
                    ['text' => 'Name of the Health and Safety Adviser', 'is_correct' => false],
                    ['text' => "Company Director's home address", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Employers have to produce a written Health and Safety Policy statement when:',
                'explanation' => 'This is a specific requirement of the Health and Safety at Work Act.',
                'options' => [
                    ['text' => 'A contract commences', 'is_correct' => false],
                    ['text' => 'They employ five people or more', 'is_correct' => true],
                    ['text' => 'The safety representative requests it', 'is_correct' => false],
                    ['text' => 'The HSE notifies them', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Companies employing five or more people must have a written Health and Safety Policy because:',
                'explanation' => 'This is a specific requirement of the Health and Safety at Work Act.',
                'options' => [
                    ['text' => 'The principal contractor gives them work on site', 'is_correct' => false],
                    ['text' => 'The HSAWA 1974 requires it', 'is_correct' => true],
                    ['text' => 'The Social Security Act requires it', 'is_correct' => false],
                    ['text' => 'The trade unions require it', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What do the letters HSE stand for?',
                'explanation' => 'The Health and Safety Executive was established under the Health and Safety at Work Act 1974.',
                'options' => [
                    ['text' => 'Highly Safe Electrician', 'is_correct' => false],
                    ['text' => 'Health and Safety Exercise', 'is_correct' => false],
                    ['text' => 'Health and Safety Examiner', 'is_correct' => false],
                    ['text' => 'Health and Safety Executive', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'The Health and Safety Executive is:',
                'explanation' => 'The Health and Safety Executive is part of the Department for Work and Pensions.',
                'options' => [
                    ['text' => 'Part of the National Health Service', 'is_correct' => false],
                    ['text' => 'The regulatory body for the promotion of health and safety at work', 'is_correct' => true],
                    ['text' => 'The jury in health and safety court cases', 'is_correct' => false],
                    ['text' => 'Part of the police force', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'The Health and Safety at Work Act requires employers to provide what for their employees?',
                'explanation' => 'This is a specific requirement of Section 2 of the Health and Safety at Work Act.',
                'options' => [
                    ['text' => 'Adequate rest periods', 'is_correct' => false],
                    ['text' => 'Payment for work done', 'is_correct' => false],
                    ['text' => 'A safe place of work', 'is_correct' => true],
                    ['text' => 'Suitable transport to work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'The Health and Safety at Work Act 1974 and any regulations made under the Act are:',
                'explanation' => 'The requirements of health and safety law are mandatory and failure to follow them can lead to prosecution.',
                'options' => [
                    ['text' => 'Not compulsory, but should be complied with if convenient', 'is_correct' => false],
                    ['text' => 'Advisory to companies and individuals', 'is_correct' => false],
                    ['text' => 'Practical advice for the employer to follow', 'is_correct' => false],
                    ['text' => 'Legally binding', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Under the Health and Safety at Work Act 1974, which of the following have a duty to work safely?',
                'explanation' => 'Employers, employees and the self-employed all have duties to work safely under the Act.',
                'options' => [
                    ['text' => 'Employees only', 'is_correct' => false],
                    ['text' => 'The general public', 'is_correct' => false],
                    ['text' => 'Employers only', 'is_correct' => false],
                    ['text' => 'All people at work', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What is the MAXIMUM penalty that a Higher Court, can currently impose for a breach of the Health and Safety at Work Act?',
                'explanation' => 'A Lower Court can impose a fine of up to £20,000 and/or up to six months imprisonment for certain offences. The potential fine in a Higher Court, however, is unlimited and the term of imprisonment can be up to 2 years.',
                'options' => [
                    ['text' => "£20,000 fine and two years' imprisonment", 'is_correct' => false],
                    ['text' => "£15,000 fine and three years' imprisonment", 'is_correct' => false],
                    ['text' => "£1,000 fine and six months imprisonment", 'is_correct' => false],
                    ['text' => "Unlimited fine and two years' imprisonment", 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What do the letters ACOP stand for?',
                'explanation' => 'An ACOP is a code of practice approved by the Health and Safety Executive (or the Health and Safety Commission prior to April 2008).',
                'options' => [
                    ['text' => 'Accepted Code of Provisions', 'is_correct' => false],
                    ['text' => 'Approved Condition of Practice', 'is_correct' => false],
                    ['text' => 'Approved Code of Practice', 'is_correct' => true],
                    ['text' => 'Accepted Code of Practice', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Where should you look for official advice on health and safety matters?',
                'explanation' => "The HSE is the UK enforcing body and its guidance can be regarded as 'official'.",
                'options' => [
                    ['text' => 'A set of health and safety guidelines provided by suppliers', 'is_correct' => false],
                    ['text' => 'The health and safety rules as laid down by the employer', 'is_correct' => false],
                    ['text' => 'Guidance issued by the Health and Safety Executive', 'is_correct' => true],
                    ['text' => 'A professionally approved guide book on regulations', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Regulations that govern health and safety on construction sites:',
                'explanation' => 'The requirements of health and safety law are mandatory, and failure to follow them can lead to prosecutions.',
                'options' => [
                    ['text' => 'Apply only to inexperienced workers', 'is_correct' => false],
                    ['text' => "Do not apply during 'out of hours' working", 'is_correct' => false],
                    ['text' => 'Apply only to large companies', 'is_correct' => false],
                    ['text' => 'Are mandatory (that is, compulsory)', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Which of the following statements is correct?',
                'explanation' => 'This is a legal requirement under Section 7 of the Health & Safety at Work Act.',
                'options' => [
                    ['text' => 'The duty for health and safety falls only on the employer', 'is_correct' => false],
                    ['text' => 'All employees must take reasonable care, not only to protect themselves but also their colleagues', 'is_correct' => true],
                    ['text' => 'Employees have no responsibility for Health and Safety on site', 'is_correct' => false],
                    ['text' => 'Only the client is responsible for safety on site', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Who of the following would you expect to be responsible for managing health and safety on site?',
                'explanation' => 'The responsibility for management of health and safety at work rests with the employer.',
                'options' => [
                    ['text' => 'Foreman', 'is_correct' => false],
                    ['text' => 'Your employer', 'is_correct' => true],
                    ['text' => 'Main sub-contractor', 'is_correct' => false],
                    ['text' => 'HSE Inspector', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Which of the following is correct for risk assessment?',
                'explanation' => 'There is a legal requirement for all work to be suitably risk assessed.',
                'options' => [
                    ['text' => 'It is a good idea but not essential', 'is_correct' => false],
                    ['text' => 'Only required to be done for hazardous work', 'is_correct' => false],
                    ['text' => 'Must always be done', 'is_correct' => true],
                    ['text' => 'Only required on major jobs', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'In the context of a risk assessment, what do you understand by the term risk?',
                'explanation' => 'Hazard and risk are not the same. Risk reflects the chance of being harmed by a hazard.',
                'options' => [
                    ['text' => 'An unsafe act or condition', 'is_correct' => false],
                    ['text' => 'Something with the potential to cause injury', 'is_correct' => false],
                    ['text' => 'Any work activity that can be described as dangerous', 'is_correct' => false],
                    ['text' => 'The likelihood that harm from a particular hazard will occur', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Who would you expect to carry out a risk assessment on your working site?',
                'explanation' => "A risk assessment must be conducted by a 'competent person'.",
                'options' => [
                    ['text' => 'The CDM Co-ordinator', 'is_correct' => false],
                    ['text' => 'A visiting HSE Inspector', 'is_correct' => false],
                    ['text' => 'The construction project designer', 'is_correct' => false],
                    ['text' => 'A competent person', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What is a HAZARD?',
                'explanation' => 'Examples of hazards include: a drum of acid, breeze blocks on an elevated plank; cables running across a floor.',
                'options' => [
                    ['text' => 'Where an accident is likely to happen', 'is_correct' => false],
                    ['text' => 'An accident waiting to happen', 'is_correct' => false],
                    ['text' => 'Something with the potential to cause harm', 'is_correct' => true],
                    ['text' => 'The likelihood of something going wrong', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What must be done before any work begins?',
                'explanation' => 'This is a legal requirement of the Management of Health and Safety at Work Regulations.',
                'options' => [
                    ['text' => 'Emergency plan', 'is_correct' => false],
                    ['text' => 'Assessment of risk', 'is_correct' => true],
                    ['text' => 'Soil assessment', 'is_correct' => false],
                    ['text' => 'Geological survey', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Complete the following sentence: A risk assessment:',
                'explanation' => 'Risk assessment involves a careful review of what can cause harm and the practical measures to be taken to reduce the risk of harm.',
                'options' => [
                    ['text' => 'Is a piece of paper required by law', 'is_correct' => false],
                    ['text' => 'Prevents accidents', 'is_correct' => false],
                    ['text' => 'Is a means of analysing what might go wrong', 'is_correct' => true],
                    ['text' => "Isn't particularly useful", 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Why would your supervisor ask you to read the method statement and risk assessment before you start your next job?',
                'explanation' => 'The supervisor must, by law, keep workers advised of significant risks, and control measures.',
                'options' => [
                    ['text' => 'They think you have got nothing better to do', 'is_correct' => false],
                    ['text' => 'The documents contain information on how to carry out the job in a safe manner', 'is_correct' => true],
                    ['text' => "They wouldn't as they think they are a waste of time", 'is_correct' => false],
                    ['text' => 'As someone has taken the time and trouble to write them, you might as well read them', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What do the blue and white health and safety signs tell you?',
                'explanation' => "Blue and white signs show a 'mandatory' requirement.",
                'options' => [
                    ['text' => 'Things you must do', 'is_correct' => true],
                    ['text' => 'Where the nearest fire exit is', 'is_correct' => false],
                    ['text' => 'The hazards in the area', 'is_correct' => false],
                    ['text' => 'Things you must not do', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What are emergency exit signs colours?',
                'explanation' => 'The colours are prescribed in the Health and Safety (Safety Signs and Signals) Regulations.',
                'options' => [
                    ['text' => 'Green and white', 'is_correct' => true],
                    ['text' => 'Red and yellow', 'is_correct' => false],
                    ['text' => 'Red and white', 'is_correct' => false],
                    ['text' => 'Blue and white', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'What is the main colour on a safety sign stating that you must NOT do something?',
                'explanation' => 'Prohibitory signs are round and feature a black pictogram on a white background with red edging and diagonal line.',
                'options' => [
                    ['text' => 'Blue', 'is_correct' => false],
                    ['text' => 'Green', 'is_correct' => false],
                    ['text' => 'Red', 'is_correct' => true],
                    ['text' => 'Yellow', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => "The Health and Safety (Safety Signs and Signals) Regulations require the colour coding of signs. What colours are used on a sign indicating a warning, for example 'Fork-lift trucks operating'?",
                'explanation' => 'Warning signs are triangular and feature a black pictogram on a yellow background with black edging.',
                'options' => [
                    ['text' => 'Blue and white', 'is_correct' => false],
                    ['text' => 'Green and white', 'is_correct' => false],
                    ['text' => 'Yellow and black', 'is_correct' => true],
                    ['text' => 'Red and white', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => "The Health and Safety (Safety Signs and Signals) Regulations require the colour coding of safety signs. What colours are used on a sign indicating a prohibited activity, for example 'No access for pedestrians'?",
                'explanation' => 'Prohibitory signs are round and feature a black pictogram on a white background with red edging and diagonal line.',
                'options' => [
                    ['text' => 'Green and white', 'is_correct' => false],
                    ['text' => 'Red, black and white', 'is_correct' => true],
                    ['text' => 'Blue and white', 'is_correct' => false],
                    ['text' => 'Yellow and black', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => "The Health and Safety (Safety Signs and Signals) Regulations require the colour coding of safety signs. What colours are used on a sign indicating a mandatory activity, for example 'Safety helmets must be worn'?",
                'explanation' => 'Mandatory signs are round and feature a white pictogram on a blue background.',
                'options' => [
                    ['text' => 'Green and white', 'is_correct' => false],
                    ['text' => 'Red, black and white', 'is_correct' => false],
                    ['text' => 'Blue and white', 'is_correct' => true],
                    ['text' => 'Yellow and black', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'The Health and Safety (Safety Signs and Signals) Regulations require the colour coding of safety signs. What colours are used on a sign indicating a safe condition, for example First Aid kit?',
                'explanation' => 'Emergency escape and first-aid signs are rectangular or square and feature a white pictogram on a green background.',
                'options' => [
                    ['text' => 'Red, black and white', 'is_correct' => false],
                    ['text' => 'Blue and white', 'is_correct' => false],
                    ['text' => 'Yellow and black', 'is_correct' => false],
                    ['text' => 'Green and white', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'Why should regular inspections of the workplace take place?',
                'explanation' => 'The Management of Health and Safety at Work Regulations require that routine inspections of workplaces are carried out to ensure that preventative and protective measures are in place and effective.',
                'options' => [
                    ['text' => 'To check whether the working environment is safe', 'is_correct' => true],
                    ['text' => 'To check that all employees are present', 'is_correct' => false],
                    ['text' => 'To check that everyone is doing their job', 'is_correct' => false],
                    ['text' => 'To prepare for a visit from an HSE Inspector', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 1,
                'text' => 'How can you help to prevent accidents?',
                'explanation' => 'Action to improve safety can only be taken if the risk is known about. Employees have a duty of care to other employees.',
                'options' => [
                    ['text' => "Don't report them", 'is_correct' => false],
                    ['text' => 'Know how to get help quickly', 'is_correct' => false],
                    ['text' => 'Report any unsafe conditions', 'is_correct' => true],
                    ['text' => 'Know where the first-aid kit is kept', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questions as $questionData) {
            $question = Question::create([
                'section_id' => $questionData['section_id'],
                'text' => $questionData['text'],
                'explanation' => $questionData['explanation'],
            ]);

            foreach ($questionData['options'] as $optionData) {
                $question->options()->create($optionData);
            }
        }
    }
}