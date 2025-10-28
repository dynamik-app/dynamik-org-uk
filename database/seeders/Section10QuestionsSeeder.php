<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class Section10QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'section_id' => 10,
                'text' => 'In accordance with the Electricity at Work regulations, when considering whether to work live a responsible person should:',
                'explanation' => 'To identify and assess the risks involved and the methods of controlling them.',
                'options' => [
                    ['text' => 'Carry out a risk assessment', 'is_correct' => true],
                    ['text' => 'Only work dead', 'is_correct' => false],
                    ['text' => 'Only work live', 'is_correct' => false],
                    ['text' => 'Do as the client demands', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The normal procedure for working on electrical equipment should be which one of the following?',
                'explanation' => 'Dead working should be considered as the norm and work on or near live conductors should rarely be permitted.',
                'options' => [
                    ['text' => 'Dead working', 'is_correct' => true],
                    ['text' => 'Wearing insulated gloves', 'is_correct' => false],
                    ['text' => 'Using insulated tools', 'is_correct' => false],
                    ['text' => 'Live working', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Test instruments used for working on electrical systems should:',
                'explanation' => 'To protect the user from electric shock whilst using the instrument. i.e. handling the probes.',
                'options' => [
                    ['text' => 'Be yellow in colour', 'is_correct' => false],
                    ['text' => 'Be less than 10 years old', 'is_correct' => false],
                    ['text' => 'Have non-insulated test probes', 'is_correct' => false],
                    ['text' => 'Have insulated test probes', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Under the Electricity at Work Regulations, live working is considered:',
                'explanation' => 'Extra controls must be employed, including training, supervision and use of suitable tools and protective equipment.',
                'options' => [
                    ['text' => 'As entirely acceptable', 'is_correct' => false],
                    ['text' => 'To be normally permitted', 'is_correct' => false],
                    ['text' => 'Only to be allowed in exceptional circumstances', 'is_correct' => true],
                    ['text' => 'Never to be allowed', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following would you use to replace the fuse in a plug if fuses were NOT available?',
                'explanation' => 'A fuse is often the main safety device in an electrical circuit. A blown fuse must only be replaced by a fuse of the correct type and rating.',
                'options' => [
                    ['text' => 'A nail', 'is_correct' => false],
                    ['text' => 'A piece of silver paper', 'is_correct' => false],
                    ['text' => 'A bit of wire', 'is_correct' => false],
                    ['text' => 'None of the options listed', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'To prove a circuit or equipment is dead after isolation what is the FIRST activity in the sequence of events?',
                'explanation' => 'This will prove that that the voltage detector (such as a two-pole voltage detector or proprietary test lamp) is working, i.e. indicating voltage.',
                'options' => [
                    ['text' => 'Make sure equipment is not working', 'is_correct' => false],
                    ['text' => 'Check between line and earth', 'is_correct' => false],
                    ['text' => 'Check that the voltage detector is working on a proving device, known live source or in built test feature', 'is_correct' => true],
                    ['text' => 'Check between line and neutral', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The nominal single phase voltage in the UK is?',
                'explanation' => 'This is the nominal voltage for public electricity supply systems within Europe.',
                'options' => [
                    ['text' => '230 volts', 'is_correct' => true],
                    ['text' => '240 volts', 'is_correct' => false],
                    ['text' => '415 volts', 'is_correct' => false],
                    ['text' => '400 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'When is live working permissible?',
                'explanation' => "This is a requirement under r.14 of the EAW Regulations. However, it does not mean that live working is then 'safe'.",
                'options' => [
                    ['text' => 'When the person carrying out the work is a competent person', 'is_correct' => false],
                    ['text' => 'When it is unreasonable in all circumstances for the equipment to be made dead and suitable precautions are taken', 'is_correct' => true],
                    ['text' => 'When the means of isolation cannot be identified', 'is_correct' => false],
                    ['text' => 'When the person working on the equipment is wearing rubber gloves', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following is NOT a requirement of low voltage safe isolation practice?',
                'explanation' => 'Safe isolation practice refers to dead working. The use of insulating gloves will generally only be applicable to live working.',
                'options' => [
                    ['text' => 'Ensuring that the correct point of isolation is identified', 'is_correct' => false],
                    ['text' => 'The person carrying out the work is issued with insulating gloves', 'is_correct' => true],
                    ['text' => 'A caution notice should be applied at the point of isolation', 'is_correct' => false],
                    ['text' => 'The conductors are proved to be dead at the point of work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The specific effects on the human body of a major electric shock are one of the following:',
                'explanation' => null,
                'options' => [
                    ['text' => 'Dermatitis', 'is_correct' => false],
                    ['text' => 'Burns and cardiac arrest', 'is_correct' => true],
                    ['text' => 'Broken bones', 'is_correct' => false],
                    ['text' => 'Chest pains', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The lowest level of electrical current which can harm the human body is normally measured in:',
                'explanation' => 'Research has shown that a person is in serious danger of a fatal electric shock at, or above, approximately 30 milliamps.',
                'options' => [
                    ['text' => 'Microamps', 'is_correct' => false],
                    ['text' => 'Kiloamps', 'is_correct' => false],
                    ['text' => 'Amps', 'is_correct' => false],
                    ['text' => 'Milliamps', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'With regard to the effect of electrical current on the human body, one of the following is correct:',
                'explanation' => 'An RCD is a mechanical switching device intended to cause the opening of the contacts when the residual current attains a given value under specified conditions.',
                'options' => [
                    ['text' => 'A 6 amp circuit breaker should prevent a person receiving a fatal electric shock', 'is_correct' => false],
                    ['text' => 'A 3 amp fuse should prevent a person receiving a fatal electric shock', 'is_correct' => false],
                    ['text' => 'A 30 mA Residual Current Device (RCD) should prevent a person receiving a fatal electric shock', 'is_correct' => true],
                    ['text' => 'A 5 amp rewireable fuse should prevent a person receiving a fatal electric shock', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Where mains voltage is used to supply portable equipment on a construction site, what additional protection is required?',
                'explanation' => 'Reduced low voltage systems (e.g. 110 volt centre point earthed) are strongly preferred in such circumstances. Where only mains voltage (230 V) equipment is available, however, a 30 mA RCD will give additional protection against fatal electric shock.',
                'options' => [
                    ['text' => 'Step-down transformer', 'is_correct' => false],
                    ['text' => 'Step-down generator', 'is_correct' => false],
                    ['text' => 'Cable avoidance tool', 'is_correct' => false],
                    ['text' => 'Residual current device (RCD)', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'What colour cable USUALLY signifies 110 volt power supply on site?',
                'explanation' => 'Yellow is the usual colour of cables, socket outlets, plugs and transformers etc which are used with a 110 volt supply.',
                'options' => [
                    ['text' => 'Black', 'is_correct' => false],
                    ['text' => 'Red', 'is_correct' => false],
                    ['text' => 'Blue', 'is_correct' => false],
                    ['text' => 'Yellow', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'A portable electric generator on site has two power outlets, 110 volts and 230 volts. What colour would the 110 volt outlet be?',
                'explanation' => 'Yellow is the usual colour of cables, socket outlets, plugs and transformers etc which are used with a 110 volt supply.',
                'options' => [
                    ['text' => 'Black', 'is_correct' => false],
                    ['text' => 'Yellow', 'is_correct' => true],
                    ['text' => 'Red', 'is_correct' => false],
                    ['text' => 'Blue', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Where there is no local means of isolation for equipment or circuits to be worked on, which of the following is the preferred method of isolation?',
                'explanation' => 'Isolating the whole installation or distribution board is the safest method.',
                'options' => [
                    ['text' => 'Use a suitable device such as a circuit breaker', 'is_correct' => true],
                    ['text' => 'Isolation of the individual circuit breaker or fuse', 'is_correct' => false],
                    ['text' => "Pulling out the distributor's cut-out fuse", 'is_correct' => false],
                    ['text' => 'Disconnecting the individual circuit from the DB', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'What action should you take if a workmate gets an electric shock?',
                'explanation' => 'If you can switch the power off, the electric hazard will be removed. First aid assistance will then probably be required. Do not touch someone who is still in contact with live electrical cables as you could also receive an electric shock.',
                'options' => [
                    ['text' => 'Phone the electricity board immediately', 'is_correct' => false],
                    ['text' => 'Dial 999 and ask for the fire brigade', 'is_correct' => false],
                    ['text' => 'Cut off the power and call for help', 'is_correct' => true],
                    ['text' => 'Try to pull them to safety', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'A residual current device is designed to operate in the event of one of the following:',
                'explanation' => 'An RCD provides additional protection against the risk of electric shock.',
                'options' => [
                    ['text' => 'Overload', 'is_correct' => false],
                    ['text' => 'Earth fault', 'is_correct' => true],
                    ['text' => 'Lightning strike on the supply', 'is_correct' => false],
                    ['text' => 'Short-circuit', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Electrical installations on construction sites should be periodically inspected and tested:',
                'explanation' => 'Three monthly inspections of construction site installations are recommended in IET Guidance Note 3.',
                'options' => [
                    ['text' => 'Every 3 months', 'is_correct' => true],
                    ['text' => 'Every year', 'is_correct' => false],
                    ['text' => 'Every 6 months', 'is_correct' => false],
                    ['text' => 'Every month', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The maximum AC voltage which the human body can withstand without long term physiological effects in dry conditions is:',
                'explanation' => 'Regarded as a non-fatal voltage level.',
                'options' => [
                    ['text' => '110 volts', 'is_correct' => false],
                    ['text' => '230 volts', 'is_correct' => false],
                    ['text' => '50 volts', 'is_correct' => true],
                    ['text' => '400 volts', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following statements is true with regard to the dangers of electricity?',
                'explanation' => 'The features which make electricity so dangerous are that you cannot see, hear or smell it. It can give you a very unpleasant surprise. Always assume that cables are live.',
                'options' => [
                    ['text' => 'Electricity is perfectly safe so long as you wear cotton gloves', 'is_correct' => false],
                    ['text' => 'Electricity is only dangerous if you are not wearing wellington boots', 'is_correct' => false],
                    ['text' => 'Electricity is only dangerous in wet weather', 'is_correct' => false],
                    ['text' => 'Electricity is dangerous at any time because you cannot tell by looking at a cable whether or not it is live', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'What is the most serious effect that electric shock can have if you come into contact with a live part?',
                'explanation' => 'Contact with live electrical parts can be fatal. If you do not know otherwise, always assume that electrical parts are live.',
                'options' => [
                    ['text' => 'The electric current can cause a slight tingling in the fingers', 'is_correct' => false],
                    ['text' => 'The electric current can cause burn marks on the fingers', 'is_correct' => false],
                    ['text' => 'The electric current can cause the heart to stop, resulting in death', 'is_correct' => true],
                    ['text' => 'The electric current can cause the finger muscles to twitch', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Your job involves you working near to hanging electrical cables which have bare ends. What should you do?',
                'explanation' => 'You must always assume that exposed cables are live until you know they are not. Contact with live electrical cables can kill.',
                'options' => [
                    ['text' => 'Touch the cables to see if they are live', 'is_correct' => false],
                    ['text' => "Carry on working, as there shouldn't be a problem", 'is_correct' => false],
                    ['text' => 'Inform your supervisor and keep well away', 'is_correct' => true],
                    ['text' => 'Attempt to push the cables back into the ceiling void so that you can start work', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'For all live working activities it is necessary to:',
                'explanation' => null,
                'options' => [
                    ['text' => 'Carry out a risk assessment as required by the EAW Regulations.', 'is_correct' => true],
                    ['text' => 'Wear rubber gloves only', 'is_correct' => false],
                    ['text' => 'Be accompanied', 'is_correct' => false],
                    ['text' => 'Keep your fingers crossed', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'An electrical Permit to Work is primarily a statement that:',
                'explanation' => "Permits to work describe the procedures that prevent a major hazard, such as electricity or moving machinery, from causing harm, usually by isolation to effectively ensure (in the case of electricity) 'dead' working with no chance of it going 'live'.",
                'options' => [
                    ['text' => 'Someone else has taken responsibility for the work', 'is_correct' => false],
                    ['text' => 'The circuit or equipment is live', 'is_correct' => false],
                    ['text' => 'Certain instructions need to be followed', 'is_correct' => false],
                    ['text' => 'The circuit or equipment has been isolated and is safe to work on', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The probes of voltage detectors and test instruments used on electrical systems should be:',
                'explanation' => 'In addition, to protect against damage by overcurrent whilst in use, the probes or instrument should incorporate suitable high breaking capacity (hbc) fuses with a low current rating (usually not exceeding 500 mA), or current-limiting resistors.',
                'options' => [
                    ['text' => 'Manufactured in the UK.', 'is_correct' => false],
                    ['text' => 'Accompanied by a calibration certificate', 'is_correct' => false],
                    ['text' => 'Shaped or have barriers to prevent finger contact with the tips', 'is_correct' => true],
                    ['text' => 'Coloured red', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following does the Electricity at Work (EAW) regulations apply to?',
                'explanation' => 'The EAW Regulations impose duties on employers, employees and the self employed.',
                'options' => [
                    ['text' => 'All persons engaged for work purposes', 'is_correct' => true],
                    ['text' => 'Self employed persons only', 'is_correct' => false],
                    ['text' => 'Employees only', 'is_correct' => false],
                    ['text' => 'Employers only', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The Electricity at Work Regulations require that:',
                'explanation' => 'Competency is a requirement of r. 16 of the EAW Regulations.',
                'options' => [
                    ['text' => 'Persons working with electricity must have the appropriate level of knowledge and experience', 'is_correct' => true],
                    ['text' => 'A training course is necessary before anyone can work with electricity', 'is_correct' => false],
                    ['text' => 'Only electricians can work with electricity', 'is_correct' => false],
                    ['text' => 'Anyone supervised can work with electricity', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The Electricity at Work Regulations apply to:',
                'explanation' => 'The EAW Regulations cover the safe use of electricity in work activities, irrespective of voltage.',
                'options' => [
                    ['text' => 'Only low voltage systems', 'is_correct' => false],
                    ['text' => 'Only extra-low voltage systems', 'is_correct' => false],
                    ['text' => 'All voltage systems', 'is_correct' => true],
                    ['text' => 'Only high voltage systems', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following should be used to prove a circuit or equipment is dead after isolation?',
                'explanation' => 'Accident history has shown that using incorrectly set multimeters or makeshift devices for voltage detection has often caused accidents. The use of non-contact voltage indicators (voltage sticks) is also not advised as the sole means of proving dead.',
                'options' => [
                    ['text' => 'A lamp holder with a length of flex attached', 'is_correct' => false],
                    ['text' => 'A proprietary test lamp or two-pole voltage detector', 'is_correct' => true],
                    ['text' => 'A voltage stick', 'is_correct' => false],
                    ['text' => 'A multimeter', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following is NOT a suitable means of isolating a circuit?',
                'explanation' => 'The isolating device should be switched off or the fuse removed. The switch, circuit breaker or enclosure should then be locked and the key removed. A notice or label should also be posted to warn that someone is working on the circuit or apparatus.',
                'options' => [
                    ['text' => 'Removing a fuse and locking the distribution board', 'is_correct' => false],
                    ['text' => 'Putting insulating tape over the circuit breaker', 'is_correct' => true],
                    ['text' => 'Padlocking the isolating switch', 'is_correct' => false],
                    ['text' => 'Fitting a padlocked circuit breaker lockout', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following work procedures on electrical systems will always require a permit-to-work to be issued?',
                'explanation' => 'An electrical permit-to-work should state what circuit or equipment has been made safe, how that has been achieved and what work is to be done. A permit should not, therefore, be used for live working. Such a permit is always required for work on high-voltage systems, but can also be used for low-voltage systems.',
                'options' => [
                    ['text' => 'Dead working on low-voltage systems', 'is_correct' => false],
                    ['text' => 'Live working on low-voltage systems', 'is_correct' => false],
                    ['text' => 'Dead working on high-voltage systems', 'is_correct' => true],
                    ['text' => 'Live working on high-voltage systems', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Optical fibre cable remnants should not be left lying around on site because:',
                'explanation' => 'Fibre fragments can enter the bloodstream and cause infections in the skin or eyes. All fibre waste, particularly small pieces, should be placed in suitable receptacles.',
                'options' => [
                    ['text' => 'They can be hot and burn upon contact', 'is_correct' => false],
                    ['text' => 'Laser beams still exist in the cut pieces', 'is_correct' => false],
                    ['text' => 'They can pierce the skin or eyes', 'is_correct' => true],
                    ['text' => 'They are toxic', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => "Why should the end of an optical fibre cable never be pointed towards your own or anyone else's eyes?",
                'explanation' => 'Exposure to light sources such as lasers or highly concentrated visible or infrared light beams, associated with the testing or use of optical fibres, can cause damage to the eyes, or even blindness.',
                'options' => [
                    ['text' => 'The beam can transfer a strong electric current', 'is_correct' => false],
                    ['text' => 'The colour of the beam is very hypnotic', 'is_correct' => false],
                    ['text' => 'The beam can bore a hole through the skin', 'is_correct' => false],
                    ['text' => 'The beam can damage the eyes', 'is_correct' => true],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'The use of a multi-lock hasp with the appropriate number of padlocks is a recommended method of safe isolation where:',
                'explanation' => 'A multi-lock hasp can be used to prevent operation of the isolator until such time that all persons working on the electrical installation have completed their work and removed their padlocks from the hasp.',
                'options' => [
                    ['text' => 'Individual circuit breaker locking off devices are not available', 'is_correct' => false],
                    ['text' => 'Individual circuit breakers are not identified at the distribution board', 'is_correct' => false],
                    ['text' => 'More than one person will be working on circuits supplied from the same distribution board', 'is_correct' => true],
                    ['text' => 'You know the health and safety inspector is in the area', 'is_correct' => false],
                ],
            ],
            [
                'section_id' => 10,
                'text' => 'Which of the following procedures should be used when more than one person will be working on circuits supplied from a distribution board which has been switched off?',
                'explanation' => 'A multi-lock hasp can be used to prevent operation of the isolator until such time that all persons working on the electrical installation have completed their work and removed their padlocks from the hasp.',
                'options' => [
                    ['text' => 'The use of a multi-lock hasp on the isolator with a padlock for each operative', 'is_correct' => true],
                    ['text' => 'Blowing a horn before the power is switched on again', 'is_correct' => false],
                    ['text' => 'Giving each operative a volt stick', 'is_correct' => false],
                    ['text' => 'Telling everyone what time the power will be switched on again', 'is_correct' => false],
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