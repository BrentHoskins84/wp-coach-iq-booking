import React from 'react'
import FullCalendar from '@fullcalendar/react' // must go before plugins
import dayGridPlugin from '@fullcalendar/daygrid' // a plugin!

export function createEventId() {
	return String(eventGuid++)
}

export default function Calendar() {
	let todayStr = new Date().toISOString().replace(/T.*$/, '') // YYYY-MM-DD of today
	let eventGuid = 0

	function createEventId() {
		return String(eventGuid++)
	}

	const INITIAL_EVENTS= [
		{
			id: createEventId(),
			title: 'Coach P - Batting',
			start: todayStr + 'T15:00:00',
			resourceId: 'a',
		},
		{
			id: createEventId(),
			title: 'Coach D - Pitching',
			start: todayStr + 'T12:00:00',
			resourceId: 'b',
		}
	];

	return (
		<div className="cb-calendar-wrapper">
			<FullCalendar
				plugins={[ dayGridPlugin ]}
				initialView="dayGridMonth"
				contentHeight={600}
				initialEvents={INITIAL_EVENTS}
			/>
		</div>
	);
}
